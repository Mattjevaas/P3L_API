<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PengadaanBarang extends Model
{
    protected $table = 'Pengadaan_barang';
    protected $primaryKey = 'idPengadaanBarang';
    public $timestamps = false;
}