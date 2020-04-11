<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ukuran_hewan extends Model
{
    use SoftDeletes;

    const UPDATED_AT = 'edited_at';
    protected $table = 'Ukuran_hewan';
    protected $primaryKey = 'idUkuranHewan';
    protected $dates = ['deleted_at'];
}