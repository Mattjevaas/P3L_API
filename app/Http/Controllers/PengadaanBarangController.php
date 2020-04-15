<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\PengadaanBarang;
use App\Supplier;
use App\Pegawai;
use App\RincianPengadaan;
use App\ProdukBarang;

class PengadaanBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = PengadaanBarang::all();

        $i = 0;
        foreach ($results as $data)
        {
            $supplier = Supplier::where('idSupplier',$results[$i]['idSupplier'])->first();
            $pegawai = Pegawai::where('idPegawai',$results[$i]['idPegawai'])->first();
            $product = RincianPengadaan::where('idPengadaanBarang',$results[$i]['idPengadaanBarang'])->get();

            if($supplier && $pegawai)
            {
                $results[$i]['idSupplier'] =  $supplier;
                $results[$i]['idPegawai'] = $pegawai;
            }
            else
            {
                //pegawai null hewan auto hapus
                $results[$i] = null;
            }
            
            if($product)
            {   
                $z=0;

                foreach ($product as $data2)
                {
                    $barang = ProdukBarang::where('idProduk',$product[$z]['idProduk'])->first();

                    if($barang)
                    {
                        $product[$z]['idProduk'] = $barang;
                    }

                    $z++;
                }

                $results[$i]->listProduct = $product;
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
        $result = PengadaanBarang::where('idPengadaanBarang',$id)->first();

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
        $result = PengadaanBarang::where('idPengadaanBarang',$id)->first();

        if($result) 
        {
            $result2 = PengadaanBarang::where('idPengadaanBarang',$id)->delete();

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
            'namaPengadaan' => 'required|string',
            'idSupplier' => 'required',
        ]);
        
        $pengadaan = new PengadaanBarang;
        //$password = Crypt::encrypt($request->input('password'));

        $pengadaan->namaPengadaan = $request->input('namaPengadaan');
        $pengadaan->statusBrgDatang = "Belum Selesai";
        $pengadaan->statusCetak = "Belum Cetak";
        $pengadaan->idSupplier = $request->input('idSupplier');
        $pengadaan->total = 0;
        
        //ini perlu diubah
        $user = Auth::user();   
        $pengadaan->idPegawai = $user['idPegawai'];

        if($pengadaan->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}