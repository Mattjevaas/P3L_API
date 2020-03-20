<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    const UPDATED_AT = 'edited_at';
    protected $table = 'Customer';
    protected $primaryKey = 'idCustomer_Member';
    protected $dates = ['deleted_at'];
}