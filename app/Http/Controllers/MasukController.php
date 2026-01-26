<?php

namespace App\Http\Controllers;

use App\Models\MasukModel;
use App\Models\BarangModel;
use App\Models\StokModel;
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
        $validated = $request->validate([
            'tanggal_masuk_in' => 'required|date',
            'nama_reseller' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'Qty_masuk' => 'required|integer|min:1',
            'alasan' => 'nullable|string|max:255',
            'id_gudang' => 'required|exists:gudang,id_gudang',
            'id_user' => 'required|exists:userr,id_user',
        ]);

        // cari / buat barang
        // $barang = BarangModel::firstOrCreate(
        //     ['nama_barang' => $validated['nama_barang']],
        //     ['kode_barang' => 'BRG-' . time()]
        // );
        $lastBarang = BarangModel::orderBy('id_barang', 'desc')->first();
        $nextNumber = $lastBarang ? $lastBarang->id_barang + 1 : 1;
        $kode_barang = 'BRG-' . $nextNumber;
        $barang = BarangModel::create([
            'nama_barang' => $validated['nama_barang'],
            'kode_barang' => $kode_barang
        ]);

        MasukModel::create([
            'tanggal_masuk_in' => $validated['tanggal_masuk_in'],
            'nama_reseller' => $validated['nama_reseller'],
            'Qty_masuk' => $validated['Qty_masuk'],
            'alasan' => $validated['alasan'],
            'status_masuk' => 'pending',
            'id_barang' => $barang->id_barang,
            'id_gudang' => $validated['id_gudang'],
            'id_user' => $validated['id_user'],
        ]);

        return back()->with('success', 'Barang masuk menunggu persetujuan admin');
        // Debug: log request data
        // Log::info('Barang Masuk Request:', $request->all());

        // $validatedData = $request->validate([
        //     'tanggal_masuk_in' => 'required|date',
        //     'nama_reseller' => 'required|string|max:255',
        //     'nama_barang' => 'required|string|max:255',
        //     'Qty_masuk' => 'required|integer|min:1',
        //     'alasan' => 'nullable|string|max:255',
        //     'id_gudang' => 'required|exists:gudang,id_gudang',
        //     'id_user' => 'required|exists:userr,id_user',
        // ]);

        // Log::info('Validated Data:', $validatedData);

        // Cari barang berdasarkan nama, jika tidak ada buat baru
        // $barang = BarangModel::where('nama_barang', $validatedData['nama_barang'])->first();
        // if (!$barang) {
        //     // Buat produk baru
        //     $kode_barang = 'BRG-' . (BarangModel::count() + 1);
        //     $barang = BarangModel::create([
        //         'nama_barang' => $validatedData['nama_barang'],
        //         'kode_barang' => $kode_barang
        //     ]);
        //     Log::info('Produk baru dibuat:', $barang->toArray());
        // }

        // $validatedData['id_barang'] = $barang->id_barang;
        // unset($validatedData['nama_barang']); // hapus nama_barang dari validatedData

        // $validatedData['status_masuk'] = 'pending'; // default status
        // $masuk = MasukModel::create($validatedData);

        // Update stok gudang tujuan
        // $stok = StokModel::where('id_gudang', $validatedData['id_gudang'])
        //                  ->where('id_barang', $validatedData['id_barang'])
        //                  ->first();

        // if ($stok) {
        //     $stok->qty_stok += $validatedData['Qty_masuk'];
        //     $stok->save();
        // } else {
        //     StokModel::create([
        //         'qty_stok' => $validatedData['Qty_masuk'],
        //         'id_gudang' => $validatedData['id_gudang'],
        //         'id_barang' => $validatedData['id_barang']
        //     ]);
        // }

        // Log::info('Data berhasil disimpan:', $masuk->toArray());

        // return redirect()->back()->with('success', 'Barang masuk berhasil ditambahkan.');
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
    public function approval()
    {
        $masuks = MasukModel::with(['barang', 'gudang', 'user'])->where('status_masuk', 'pending')->get();
        return view('kepala.warehouse1', compact('masuks'));
    }
    public function approve($id)
    {
        $masuk = MasukModel::findOrFail($id);

        if ($masuk->status_masuk !== 'pending') {
            return back()->with('error', 'Data sudah diproses');
        }

        // update stok
        $stok = StokModel::firstOrCreate(
            [
                'id_barang' => $masuk->id_barang,
                'id_gudang' => $masuk->id_gudang
            ],
            ['qty_stok' => 0]
        );

        $stok->qty_stok += $masuk->Qty_masuk;
        $stok->save();

        // update status barang masuk
        $masuk->update([
            'status_masuk' => 'setuju',
            'tanggal_masuk_approve' => now()
        ]);

        return back()->with('success', 'Barang masuk disetujui');
    }
    public function reject($id)
    {
        $masuk = MasukModel::findOrFail($id);

        $masuk->update([
            'status_masuk' => 'tolak',
            'tanggal_masuk_approve' => now()
        ]);

        return back()->with('success', 'Barang masuk ditolak');
    }
}
