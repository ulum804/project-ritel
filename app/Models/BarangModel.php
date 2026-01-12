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

    public function stok()
    {
        return $this->hasMany(StokModel::class, 'id_barang');
    }
}
