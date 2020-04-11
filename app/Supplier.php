<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    //
    const UPDATED_AT = 'edited_at';
    protected $table = 'Supplier';
    protected $primaryKey = 'idSupplier';
    protected $dates = ['deleted_at'];
}