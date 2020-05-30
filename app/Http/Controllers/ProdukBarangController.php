<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ProdukBarang;
use App\Pegawai;

class ProdukBarangController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function fetch_all(Request $request)
    {
        $results = ProdukBarang::all();

        $i = 0;
        foreach ($results as $data)
        {

            $pegawai = Pegawai::where('idPegawai',$results[$i]['edited_by'])->first();

            $results[$i]['edited_by'] = $pegawai['namaPegawai'];

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

    public function delete_specify(Request $request, $id=null)
    {
        $result = ProdukBarang::where('idProduk',$id)->first();

        if($result)
        {

            //ini perlu diganti
            $user = Auth::user();
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = ProdukBarang::where('idProduk',$id)->delete();

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

    public function edit_specify(Request $request,$id)
    {

        $this->validate($request, [
            'namaProduk' => 'required|string',
            'satuan' => 'required|string',
            'jumlahProduk' => 'required',
            'hargaJual' => 'required',
            'hargaBeli' => 'required',
            'stokMinimal' => 'required',
            'productPic' => 'required|mimes:jpeg,jpg,png'
        ]);

        $barang = ProdukBarang::where('idProduk',$id)->first();
        //$password = Crypt::encrypt($request->input('password'));

        $barang->namaProduk = $request->input('namaProduk');
        $barang->satuan = $request->input('satuan');
        $barang->jumlahProduk = $request->input('jumlahProduk');
        $barang->hargaJual = $request->input('hargaJual');
        $barang->hargaBeli = $request->input('hargaBeli');
        $barang->stokMinimal = $request->input('stokMinimal');

        $user = Auth::user();
        $barang->edited_by = 1;        ;

        //uploads process
        $picName = $request->file('productPic')->getClientOriginalName();
        $basePath = getcwd();
        $destinationPath = 'app';
        $barang->linkGambar = $picName;

        //ini perlu diubah


        if($barang->save() && $request->file('productPic')->move(storage_path($destinationPath),$picName))
        {
            return response()->json(['Status' => 'Success', 'Data' => []] ,200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }

    public function store(Request $request,$id)
    {

        $this->validate($request, [
            'namaProduk' => 'required|string',
            'satuan' => 'required|string',
            'jumlahProduk' => 'required',
            'hargaJual' => 'required',
            'hargaBeli' => 'required',
            'stokMinimal' => 'required',
            'productPic' => 'required|mimes:jpeg,jpg,png'
        ]);

        $barang = new ProdukBarang;
        //$password = Crypt::encrypt($request->input('password'));

        $barang->namaProduk = $request->input('namaProduk');
        $barang->satuan = $request->input('satuan');
        $barang->jumlahProduk = $request->input('jumlahProduk');
        $barang->hargaJual = $request->input('hargaJual');
        $barang->hargaBeli = $request->input('hargaBeli');
        $barang->stokMinimal = $request->input('stokMinimal');

        $user = Auth::user();
        $barang->edited_by = $user['idPegawai'];

        //uploads process
        $picName = $request->file('productPic')->getClientOriginalName();
        $basePath = getcwd();
        $destinationPath = 'app';
        $barang->linkGambar = $picName;

        //ini perlu diubah

        if($barang->save() && $request->file('productPic')->move(storage_path($destinationPath),$picName))
        {
            return response()->json(['Status' => 'Success', 'Data' => []] ,200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}
