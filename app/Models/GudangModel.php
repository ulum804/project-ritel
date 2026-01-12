<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GudangModel extends Model
{
    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = [
        'nama_gudang'
    ];
    public function user() {
        return $this->hasMany(UserModel::class, 'id_gudang');
    }

    public function stok() {
        return $this->hasMany(StokModel::class, 'id_gudang');
    }



}
