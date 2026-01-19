<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'userr';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nama_user',
        'password',
        'email',
        'telepon',
        'id_role',
        'id_gudang'
    ];
    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'id_role');
    }
    public function gudang()
    {
        return $this->belongsTo(GudangModel::class, 'id_gudang');
    }
}
