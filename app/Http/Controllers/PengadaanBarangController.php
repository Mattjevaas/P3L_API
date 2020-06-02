<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

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

    public function edit_specify(Request $request,$id)
    {

        $this->validate($request, [
            'namaPengadaan' => 'required|string',
            'idSupplier' => 'required',
        ]);

        $pengadaan = PengadaanBarang::where('idPengadaanBarang',$id)->first();
        //$password = Crypt::encrypt($request->input('password'));

        $pengadaan->namaPengadaan = $request->input('namaPengadaan');
        $pengadaan->idSupplier = $request->input('idSupplier');

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

    public function confirmDatang($id)
    {
        $pengadaan = PengadaanBarang::where('idPengadaanBarang',$id)->first();
        $rincian = RincianPengadaan::where('idPengadaanBarang',$id)->get();

        $i = 0;

        foreach ($rincian as $detail)
        {
            $product = ProdukBarang::where('idProduk',$rincian[$i]['idProduk'])->first();
            $product['jumlahProduk'] += $rincian[$i]['jumlahBeli'];

            $i++;
        }

        $pengadaan['statusBrgDatang'] = "Sudah Datang";

        if($pengadaan->save() && $product->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }

    }

    public function confirmCetak($id)
    {
        $pengadaan = PengadaanBarang::where('idPengadaanBarang',$id)->first();
        $pengadaan['statusCetak'] = "Sudah Cetak";

        if($pengadaan->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }

    public function simpanSurat($id)
    {
        $results = PengadaanBarang::where('idPengadaanBarang',$id)->first();

        $i = 0;
        foreach ($results as $data)
        {

            $product = RincianPengadaan::where('idPengadaanBarang',$results[$i]['idPengadaanBarang'])->get();

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
    }

    public function simpanSuratTahun(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required|string',
        ]);

        //$results = PengadaanBarang::where(YEAR('tglPengadaan'),$tahun)->get();
        $results = DB::table('Pengadaan_barang')->whereRaw("YEAR(tglPengadaan) = '".$request->input('tahun')."'")->get();

        $obj= new \stdClass();
        $obj->Januari = 0;
        $obj->Februari = 0;
        $obj->Maret = 0;
        $obj->April = 0;
        $obj->Mei = 0;
        $obj->Juni = 0;
        $obj->Juli = 0;
        $obj->Agustus = 0;
        $obj->September = 0;
        $obj->Oktober = 0;
        $obj->November = 0;
        $obj->Desember = 0;

        $i = 0;
        foreach ($results as $data)
        {
            $date = DateTime::createFromFormat("Y-n-d", $results[$i]->tglPengadaan);
            $month = $date->format("n");

            switch($month){

                case 1: $obj->Januari = $obj->Januari + $results[$i]->total;
                        break;
                case 2: $obj->Februari = $obj->Februari + $results[$i]->total;
                        break;
                case 3: $obj->Maret = $obj->Maret + $results[$i]->total;
                        break;
                case 4: $obj->April = $obj->April + $results[$i]->total;
                        break;
                case 5: $obj->Mei = $obj->Mei + $results[$i]->total;
                        break;
                case 6: $obj->Juni = $obj->Juni + $results[$i]->total;
                        break;
                case 7: $obj->Juli = $obj->Juli + $results[$i]->total;
                        break;
                case 8: $obj->Agustus = $obj->Agustus + $results[$i]->total;
                        break;
                case 9: $obj->September = $obj->September + $results[$i]->total;
                        break;
                case 10: $obj->Oktober = $obj->Oktober + $results[$i]->total;
                        break;
                case 11: $obj->November = $obj->November + $results[$i]->total;
                        break;
                case 12: $obj->Desember = $obj->Desember + $results[$i]->total;
                        break;

            }

            $i++;
        }

        $pdf = \App::make('dompdf.wrapper');
        $view = view('laporan',['obj'=>$obj, 'thn'=>$request->input('tahun')]);
        $pdf->loadHTML($view);
        return $pdf->stream();

        //return response()->json(['Status' => 'Success','Data' => $obj],200);
    }
}
