<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RincianPembelian extends Model
{
    protected $table = 'Rincian_pembelian';
    protected $primaryKey = 'idRincianPembelian';
    public $timestamps = false;
}
