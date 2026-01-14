<?php

namespace App\Http\Controllers;
use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return RoleModel::all();
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jabatan' => 'required|string|max:125',
        ]);
        return RoleModel::create($validatedData);
    }
    public function show($id)
    {
        return RoleModel::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $role = RoleModel::findOrFail($id);
        $role->update($request->all());
        return $role;
    }
    public function destroy($id)
    {
        $role = RoleModel::findOrFail($id);
        $role->delete();
        return response()->json(['message' => 'Role sudah terhapus']);
    }
}
