<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\HargaLayanan;
use App\ProdukLayanan;
use App\Jenis_hewan;
use App\Ukuran_hewan;

class HargaLayananController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function fetch_all(Request $request)
    {
        $results = HargaLayanan::all();
        
        $i = 0;
        foreach ($results as $data)
        {
            $layanan = ProdukLayanan::where('idLayanan',$results[$i]['idLayanan'])->first();
            $jenis_hewan = Jenis_hewan::where('idJenisHewan',$results[$i]['idJenisHewan'])->first();
            $ukuran_hewan = Ukuran_hewan::where('idUkuranHewan',$results[$i]['idUkuranHewan'])->first();

            if($layanan && $jenis_hewan && $ukuran_hewan)
            {
                $results[$i]['idLayanan'] =  $layanan;
                $results[$i]['idJenisHewan'] = $jenis_hewan;
                $results[$i]['idUkuranHewan'] = $ukuran_hewan;
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

    public function delete_specify(Request $request, $id=null)
    {
        $result = HargaLayanan::where('idHargaLayanan',$id)->first();

        if($result) 
        {

            //ini perlu diganti
            $user = Auth::user();   
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = HargaLayanan::where('idHargaLayanan',$id)->delete();

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
            'hargaLayanan' => 'required',
            'idUkuranHewan' => 'required',
            'idJenisHewan' => 'required',
            'idLayanan' => 'required'
        ]);
        
        $hargaLayanan = new HargaLayanan;
        //$password = Crypt::encrypt($request->input('password'));

        $hargaLayanan->hargaLayanan = $request->input('hargaLayanan');
        $hargaLayanan->idUkuranHewan = $request->input('idUkuranHewan');
        $hargaLayanan->idJenisHewan = $request->input('idJenisHewan');
        $hargaLayanan->idLayanan = $request->input('idLayanan');

        //ini perlu diubah
        $user = Auth::user();   
        $hargaLayanan->edited_by = $user['idPegawai'];

        if($hargaLayanan->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}