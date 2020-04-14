<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaLayanan extends Model
{
    use SoftDeletes;

    const UPDATED_AT = 'edited_at';
    protected $table = 'Harga_layanan';
    protected $primaryKey = 'idHargaLayanan';
    protected $dates = ['deleted_at'];
}