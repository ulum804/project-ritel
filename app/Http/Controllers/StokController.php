<?php

namespace App\Http\Controllers;
use App\Models\StokModel;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        return StokModel::all();
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'qty_stok' => 'required|string|max:255',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_gudang' => 'required|exists:gudang,id_gudang',
        ]);
        return StokModel::create($validatedData);
    }
    public function show($id)
    {
        return StokModel::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $stok = StokModel::findOrFail($id);
        $stok->update($request->all());
        return $stok;
    }
    public function destroy($id)
    {
        $stok = StokModel::findOrFail($id);
        $stok->delete();
        return response()->json(['message' => 'Stok sudah terhapus']);                  
    }
}
