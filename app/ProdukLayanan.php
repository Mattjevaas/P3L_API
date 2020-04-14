<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukLayanan extends Model
{
    use SoftDeletes;

    const UPDATED_AT = 'edited_at';
    protected $table = 'Layanan';
    protected $primaryKey = 'idLayanan';
    protected $dates = ['deleted_at'];
}