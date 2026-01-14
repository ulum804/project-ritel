<?php

namespace App\Http\Controllers;
use App\Models\GudangModel;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        $gudang = GudangModel::all();
        return view('gudang.index', compact('gudang'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_gudang' => 'required|string|max:255',
        ]);
        return GudangModel::create($validatedData);
    }
    public function show($id)
    {
        return GudangModel::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $gudang = GudangModel::findOrFail($id);
        $gudang->update($request->all());
        return $gudang;
    }
    public function destroy($id)
    {
        $gudang = GudangModel::findOrFail($id);
        $gudang->delete();
        return response()->json(['message' => 'Gudang sudah terhapus']);
    }
}
