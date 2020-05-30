<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaran extends Model
{
    protected $table = 'Transaksi_pembayaran';
    protected $primaryKey = 'idTransaksiPembayaran';
    public $timestamps = false;
}
