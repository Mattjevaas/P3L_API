<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Tymon\JWTAuth\Contracts\JWTSubject;

class Pegawai extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use SoftDeletes, Authenticatable, Authorizable;
    
    const UPDATED_AT = 'edited_at';
    protected $table = 'Pegawai';
    protected $primaryKey = 'idPegawai';
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}