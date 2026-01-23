<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang'
    ];

       // Relasi ke barang masuk
    public function barangMasuk()
    {
        return $this->hasMany(MasukModel::class, 'id_barang', 'id_barang');
    }

    // Relasi ke barang keluar
    public function barangKeluar()
    {
        return $this->hasMany(KeluarModel::class, 'id_barang', 'id_barang');
    }

    // Relasi ke gudang
    public function gudang()
    {
        return $this->belongsTo(KeluarModel::class, 'id_gudang', 'id_gudang');
    }
}
