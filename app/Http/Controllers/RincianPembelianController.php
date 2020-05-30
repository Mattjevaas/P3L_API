<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\RincianPembelian;
use App\HargaLayanan;
use App\ProdukBarang;
use App\TransaksiPembayaran;

class RincianPembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'jumlahBeli' => 'required',
            'jenisPembelian' => 'required',
            'idTransaksiPembayaran' => 'required'

        ]);

        $transaksi = TransaksiPembayaran::where('idTransaksiPembayaran',$request->input('idTransaksiPembayaran'))->first();

        if($request->input('jenisPembelian') == "Layanan")
        {
            $item = HargaLayanan::where('idHargaLayanan',$request->input('idHargaLayanan'))->first();
        }
        else
        {
            $item = ProdukBarang::where('idProduk',$request->input('idProduk'))->first();
        }

        $rincian = new RincianPembelian;
        //$password = Crypt::encrypt($request->input('password'));

        $rincian->jumlahBeli = $request->input('jumlahBeli');
        $rincian->jenisPembelian = $request->input('jenisPembelian');
        $rincian->idProduk = $request->input('idProduk');
        $rincian->idHargaLayanan = $request->input('idHargaLayanan');
        $rincian->idTransaksiPembayaran = $request->input('idTransaksiPembayaran');

        if($request->input('jenisPembelian') == "Layanan")
        {
            $total = $rincian->jumlahBeli * $item->hargaLayanan;
        }
        else
        {
            $total = $rincian->jumlahBeli * $item->hargaJual;
        }

        $transaksi->totalBayar += $total;

        if($rincian->save() && $transaksi->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }

    public function edit_specify(Request $request,$id)
    {

        $this->validate($request, [
            'jumlahBeli' => 'required',
            'jenisPembelian' => 'required',
            'idTransaksiPembayaran' => 'required'

        ]);

        $transaksi = TransaksiPembayaran::where('idTransaksiPembayaran',$request->input('idTransaksiPembayaran'))->first();
        $rincian = RincianPembelian::where('idRincianPembelian',$id)->first();

        if($request->input('jenisPembelian') == "Layanan")
        {
            $item = HargaLayanan::where('idHargaLayanan',$rincian->idHargaLayanan)->first();
            $total = $rincian->jumlahBeli * $item->hargaLayanan;
        }
        else
        {
            $item = ProdukBarang::where('idProduk',$rincian->idProduk)->first();
            $total = $rincian->jumlahBeli * $item->hargaJual;
        }

        $transaksi->totalBayar -= $total;

        $rincian->jumlahBeli = $request->input('jumlahBeli');
        $rincian->jenisPembelian = $request->input('jenisPembelian');
        $rincian->idProduk = $request->input('idProduk');
        $rincian->idHargaLayanan = $request->input('idHargaLayanan');
        $rincian->idTransaksiPembayaran = $request->input('idTransaksiPembayaran');

        if($request->input('jenisPembelian') == "Layanan")
        {
            $item = HargaLayanan::where('idHargaLayanan',$request->input('idHargaLayanan'))->first();
            $total = $rincian->jumlahBeli * $item->hargaLayanan;
        }
        else
        {
            $item = ProdukBarang::where('idProduk',$request->input('idProduk'))->first();
            $total = $rincian->jumlahBeli * $item->hargaJual;
        }

        $transaksi->totalBayar += $total;

        if($rincian->save() && $transaksi->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }

    public function delete_specify(Request $request, $id=null)
    {
        $result = RincianPembelian::where('idRincianPembelian',$id)->first();
        $transaksi = TransaksiPembayaran::where('idTransaksiPembayaran',$result->idTransaksiPembayaran)->first();

        if($result->jenisPembelian == "Layanan")
        {
            $item = HargaLayanan::where('idHargaLayanan',$result->idHargaLayanan)->first();
            $total = $result->jumlahBeli * $item->hargaLayanan;
        }
        else
        {
            $item = ProdukBarang::where('idProduk',$result->idProduk)->first();
            $total = $result->jumlahBeli * $item->hargaBeli;
        }

        $transaksi->totalBayar -= $total;


        if($result && $transaksi->save())
        {
            $result2 = RincianPembelian::where('idRincianPembelian',$id)->delete();

            if($result2)
                return response()->json(['Status' => 'Success', 'Data' => []],200);
            else
                return response()->json(['Status' => 'Failed', 'Data' => []],500);
        }
        else
        {
            return response()->json(['Status' => 'Failed', 'Data' => []],500);
        }
    }


}
