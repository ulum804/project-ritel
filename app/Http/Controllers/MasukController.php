<?php

namespace App\Http\Controllers;
use App\Models\MasukModel;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    public function index()
    {
        $masuk = MasukModel::all();
        return $masuk;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_masuk_in' => 'required|date',
            'tanggal_masuk_out' => 'nullable|date',
            'qty_masuk' => 'required|string|max:125',
            'status_masuk' => 'required|string|max:125',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_user' => 'required|exists:userr,id_user',
            'id_gudang' => 'required|exists:gudang,id_gudang',
        ]);
        return MasukModel::create($validatedData);
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
