<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasukModel extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    protected $fillable = [
        'tanggal_masuk_in',
        'tanggal_approve_in',
        'qty_masuk',
        'status_masuk',
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
