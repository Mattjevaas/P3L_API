<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\RincianPengadaan;
use App\ProdukBarang;
use App\PengadaanBarang;

class RincianPengadaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = RincianPengadaan::all();

        $i = 0;
        foreach ($results as $data)
        {
            $barang = ProdukBarang::where('idProduk',$results[$i]['idProduk'])->first();
            $pengadaan = PengadaanBarang::where('idPengadaanBarang',$results[$i]['idPengadaanBarang'])->first();

            if($barang && $pengadaan)
            {
                $results[$i]['idProduk'] =  $barang;
                $results[$i]['idPengadaanBarang'] = $pengadaan;
            }
            else
            {
                //pegawai null hewan auto hapus
                $results[$i] = null;
            }

            $i++;
        }

        if($results)
        {
            return response()->json(['Status' => 'Success','Data' => $results],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed', 'Data' => []],500);
        }
    }

    public function get_specify(Request $request, $id=null)
    {
        $result = RincianPengadaan::where('idRincianPengadaan',$id)->first();

        if($result)
        {
            return response()->json(['Status' => 'Success', 'Data' => $result],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed', 'Data' => []],500);
        }
    }

    public function delete_specify(Request $request, $id=null)
    {
        $result = RincianPengadaan::where('idRincianPengadaan',$id)->first();

        if($result) 
        {
            $result2 = RincianPengadaan::where('idRincianPengadaan',$id)->delete();

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

    public function store(Request $request)
    {

        $this->validate($request, [
            'jumlahBeli' => 'required',
            'idPengadaanBarang' => 'required',
            'idProduk' => 'required',

        ]);
        
        $rincian = new RincianPengadaan;
        //$password = Crypt::encrypt($request->input('password'));

        $rincian->jumlahBeli = $request->input('jumlahBeli');
        $rincian->idPengadaanBarang = $request->input('idPengadaanBarang');
        $rincian->idProduk = $request->input('idProduk');

        if($rincian->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}