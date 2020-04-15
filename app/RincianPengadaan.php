<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RincianPengadaan extends Model
{

    protected $table = 'Rincian_pengadaan';
    protected $primaryKey = 'idRincianPengadaan';
    public $timestamps = false;
}