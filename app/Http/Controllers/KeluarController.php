<?php

namespace App\Http\Controllers;
use App\Models\KeluarModel;
use Illuminate\Http\Request;

class KeluarController extends Controller
{
    public function index()
    {
        $keluar = KeluarModel::all();
        return $keluar;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_keluar_in' => 'required|date',
            'tanggal_keluar_out' => 'nullable|date',
            'qty_keluar' => 'required|string|max:125',
            'status_keluar' => 'required|string|max:125',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_user' => 'required|exists:userr,id_user',
            'id_gudang' => 'required|exists:gudang,id_gudang',
        ]);
        return KeluarModel::create($validatedData);
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
