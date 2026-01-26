<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\GudangModel;
use App\Models\StokModel;
use App\Models\MasukModel;
use App\Models\KeluarModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stok()
    {
        $barangs = BarangModel::all();
        $gudangs = GudangModel::all();

        $stoks = StokModel::all()->keyBy(function ($stok) {
            return $stok->id_barang . '-' . $stok->id_gudang;
        });

        return view('admin.stok', compact('barangs', 'gudangs', 'stoks'));
    }
       public function laporan()
    {
        $masuks = MasukModel::with(['barang', 'gudang', 'user'])->get();
        $keluars = KeluarModel::with(['barang', 'gudang', 'user'])->get();

        return view('admin.laporan', compact('masuks', 'keluars'));
    }
}
