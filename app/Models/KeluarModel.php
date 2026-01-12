<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeluarModel extends Model
{
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_keluar';
    protected $fillable = [
        'tanggal_keluar_in',
        'tanggal_approve_out',
        'qty_keluar',
        'status_keluar',
        'id_gudang',
        'id_user',
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
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user');
    }
}
