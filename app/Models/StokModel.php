<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';

    protected $fillable = [
        'qty_stok',
        'id_gudang',
        'id_barang'
    ];

      public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang');
    }
    public function gudang()
    {
        return $this->belongsTo(GudangModel::class, 'id_gudang');
    }

}
