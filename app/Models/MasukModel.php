<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasukModel extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    protected $fillable = [
        'tanggal_masuk_in',
        'nama_reseller',
        'Qty_masuk',
        'alasan',
        'tanggal_masuk_approve',
        'status_masuk',
        'id_barang',
        'id_gudang',
        'id_user'
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
    public function barangMasukTerakhir()
    {
        return $this->hasOne(MasukModel::class, 'id_barang', 'id_barang')
            ->where('status_masuk', 'setuju')
            ->latest('tanggal_masuk_in');
    }
}
