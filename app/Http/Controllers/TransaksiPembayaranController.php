<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TransaksiPembayaran;
use App\Hewan;
use App\Pegawai;
use App\Customer;
use App\Jenis_hewan;
use App\Ukuran_hewan;
use App\RincianPembelian;
use App\ProdukBarang;
use App\ProdukLayanan;
use App\HargaLayanan;

class TransaksiPembayaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all()
    {
        $transaksi = TransaksiPembayaran::all();

        $i = 0;

        foreach($transaksi as $transact)
        {
            $rincian = RincianPembelian::where('idTransaksiPembayaran',$transaksi[$i]['idTransaksiPembayaran'])->get();

            if($rincian)
            {
                $z = 0;

                foreach($rincian as $dataz)
                {
                    if($rincian[$z]->idProduk != NULL)
                    {
                        $produkz = ProdukBarang::where('idProduk',$rincian[$z]->idProduk)->first();

                        if($produkz)
                        {
                            $rincian[$z]['idProduk'] = $produkz;
                        }
                    }

                    if($rincian[$z]->idHargaLayanan != NULL)
                    {
                        $hargaz = HargaLayanan::where('idHargaLayanan',$rincian[$z]->idHargaLayanan)->first();

                        if($hargaz)
                        {
                            $rincian[$z]['idHargaLayanan'] = $hargaz;
                            $jenisz = Jenis_hewan::where('idJenisHewan',$rincian[$z]->idHargaLayanan->idJenisHewan)->first();
                            $ukuranz = Ukuran_hewan::where('idUkuranHewan',$rincian[$z]->idHargaLayanan->idUkuranHewan)->first();
                            $layananz = ProdukLayanan::where('idLayanan',$rincian[$z]->idHargaLayanan->idLayanan)->first();

                            if($jenisz && $ukuranz && $layananz)
                            {
                                $rincian[$z]->idHargaLayanan->idJenisHewan = $jenisz;
                                $rincian[$z]->idHargaLayanan->idUkuranHewan = $ukuranz;
                                $rincian[$z]->idHargaLayanan->idLayanan = $layananz;
                            }
                        }
                    }

                    $z++;
                }

               $transaksi[$i]->listProduct = $rincian;
            }

            if($transaksi[$i]->idHewan != null)
            {
                $hewan = Hewan::where('idHewan',$transaksi[$i]->idHewan)->first();
                $customer = Customer::where('idCustomer_Member',$hewan->idCustomer_Member)->first();
                $jenis = Jenis_hewan::where('idJenisHewan',$hewan->idJenisHewan)->first();
                $ukuran = Ukuran_hewan::where('idUkuranHewan',$hewan->idUkuranHewan)->first();
                $pegawai = Pegawai::where('idPegawai',$transaksi[$i]->idPegawai)->first();

                if($hewan && $pegawai && $customer)
                {
                    $transaksi[$i]->idPegawai = $pegawai['namaPegawai'];
                    $transaksi[$i]->idHewan = $hewan;
                    $transaksi[$i]->idHewan->idCustomer_Member = $customer;
                    $transaksi[$i]->idHewan->idJenisHewan = $jenis;
                    $transaksi[$i]->idHewan->idUkuranHewan = $ukuran;
                }
                else
                {
                    $transaksi[$i] = null;
                }
            }
            else
            {
                $pegawai = Pegawai::where('idPegawai',$transaksi[$i]->idPegawai)->first();

                if($pegawai)
                {
                    $transaksi[$i]->idPegawai = $pegawai['namaPegawai'];
                }
                else
                {
                    $transaksi[$i] = null;
                }

            }

            $i++;
        }

        if($transaksi)
        {
            return response()->json(['Status' => 'Success','Data' => $transaksi],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed', 'Data' => []],500);
        }

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'jenisTransaksi' => 'required|string',
        ]);

        $transaksi = new TransaksiPembayaran;
        $transaksi->jenisTransaksi = $request->input('jenisTransaksi');
        $transaksi->idHewan = $request->input('idHewan');
        $transaksi->totalBayar = 0;
        $transaksi->statusLunas = "Belum Lunas";

        $user = Auth::user();
        $transaksi->idPegawai = $user['idPegawai'];

        if($transaksi->save())
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
            'jenisTransaksi' => 'required|string',
        ]);

        $transaksi = TransaksiPembayaran::where('idTransaksiPembayaran',$id)->first();
        $transaksi->jenisTransaksi = $request->input('jenisTransaksi');
        $transaksi->idHewan = $request->input('idHewan');

        $user = Auth::user();
        $transaksi->idPegawai = $user['idPegawai'];

        if($transaksi->save())
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
        $result = TransaksiPembayaran::where('idTransaksiPembayaran',$id)->delete();

        if($result)
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        else
            return response()->json(['Status' => 'Failed', 'Data' => []],500);
    }

    public function confirmSelesai($id)
    {
        $transaksi = TransaksiPembayaran::where('idTransaksiPembayaran',$id)->first();
        $transaksi['statusSelesai'] = "Sudah Selesai";

        if($transaksi->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}
