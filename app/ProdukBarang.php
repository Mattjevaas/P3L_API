<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukBarang extends Model
{
    use SoftDeletes;

    const UPDATED_AT = 'edited_at';
    protected $table = 'Produk';
    protected $primaryKey = 'idProduk';
    protected $dates = ['deleted_at'];
}