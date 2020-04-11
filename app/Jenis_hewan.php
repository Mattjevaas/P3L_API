<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis_hewan extends Model
{
    use SoftDeletes;

    const UPDATED_AT = 'edited_at';
    protected $table = 'Jenis_hewan';
    protected $primaryKey = 'idJenisHewan';
    protected $dates = ['deleted_at'];
}