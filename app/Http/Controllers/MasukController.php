<?php

namespace App\Http\Controllers;

use App\Models\MasukModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasukController extends Controller
{
    public function index()
    {
        $masuk = MasukModel::all();
        return $masuk;
    }
    public function store(Request $request)
    {
        // Debug: log request data
        Log::info('Barang Masuk Request:', $request->all());

        $validatedData = $request->validate([
            'tanggal_masuk_in' => 'required|date',
            'nama_reseller' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'Qty_masuk' => 'required|integer|min:1',
            'alasan' => 'nullable|string|max:255',
            'id_gudang' => 'required|exists:gudang,id_gudang',
            'id_user' => 'required|exists:userr,id_user',
        ]);

        Log::info('Validated Data:', $validatedData);

        // Cari barang berdasarkan nama, jika tidak ada buat baru
        $barang = BarangModel::where('nama_barang', $validatedData['nama_barang'])->first();
        if (!$barang) {
            // Buat produk baru
            $kode_barang = 'BRG-' . (BarangModel::count() + 1);
            $barang = BarangModel::create([
                'nama_barang' => $validatedData['nama_barang'],
                'kode_barang' => $kode_barang
            ]);
            Log::info('Produk baru dibuat:', $barang->toArray());
        }

        $validatedData['id_barang'] = $barang->id_barang;
        unset($validatedData['nama_barang']); // hapus nama_barang dari validatedData

        $validatedData['status_masuk'] = 'pending'; // default status
        $masuk = MasukModel::create($validatedData);

        Log::info('Data berhasil disimpan:', $masuk->toArray());

        return redirect()->back()->with('success', 'Barang masuk berhasil ditambahkan.');
    }
    public function show($id)
    {
        return MasukModel::with('barang', 'user', 'gudang')->findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $masuk = MasukModel::findOrFail($id);
        $masuk->update($request->all());
        return response()->json(['message' => 'Data barang masuk sudah diperbarui', 'data' => $masuk]);
    }
    public function destroy($id)
    {
        $masuk = MasukModel::findOrFail($id);
        $masuk->delete();
        return response()->json(['message' => 'Data barang masuk sudah terhapus']);
    }
}
