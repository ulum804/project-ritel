<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'jabatan',
    ];
    public function user()
    {
        return $this->hasMany(UserModel::class, 'id_role');
    }
}
