<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\MasukModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = BarangModel::all();
        return view('barang.index', compact('barang'));
    }
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:125|unique:barang,kode_barangc',
        ]);
        return BarangModel::create($validatedData);
    }
    public function show($id)
    {
        return BarangModel::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:125|unique:barang,kode_barang,' . $id . ',id_barang',
        ]); 
    }
    public function destroy($id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();
        return response()->json(['message' => 'Barang sudah terhapus']);
    }

}
