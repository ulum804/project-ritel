<?php

namespace App\Http\Controllers;

use App\Models\KeluarModel;
use App\Models\BarangModel;
use App\Models\GudangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeluarController extends Controller
{
    public function index()
    {
        $keluar = KeluarModel::all();
        return $keluar;
    }

    public function create()
    {
        $barangs = BarangModel::all();
        $gudangs = GudangModel::all();
        return view('staff.utama', compact('barangs', 'gudangs'));
    }
    public function store(Request $request)
    {
        // Debug: log request data
        Log::info('Barang Keluar Request:', $request->all());

        $validatedData = $request->validate([
            'tanggal_keluar_in' => 'required|date',
            'id_barang' => 'required|exists:barang,id_barang',
            'qty_keluar' => 'required|integer|min:1',
            'harga_satuan' => 'nullable|numeric|min:0',
            'alasan' => 'nullable|string|max:255',
            'id_gudang_tujuan' => 'required|exists:gudang,id_gudang',
            'id_gudang' => 'required|exists:gudang,id_gudang',
            'id_user' => 'required|exists:userr,id_user',
        ]);

        Log::info('Validated Data:', $validatedData);

        $validatedData['status_keluar'] = 'pending'; // default status
        $keluar = KeluarModel::create($validatedData);

        Log::info('Data berhasil disimpan:', $keluar->toArray());

        return redirect()->back()->with('success', 'Barang keluar berhasil ditambahkan.');
    }
    public function show($id)
    {
        return $keluar = KeluarModel::with('barang', 'user', 'gudang')->findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $keluar = KeluarModel::findOrFail($id);
        $keluar->update($request->all());
        return response()->json(['message' => 'Data barang keluar sudah diperbarui', 'data' => $keluar]);
    }
    public function destroy($id)
    {
        $keluar = KeluarModel::findOrFail($id);
        $keluar->delete();
        return response()->json(['message' => 'Data barang keluar sudah terhapus']);
    }
}
