<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ProdukLayanan;

class ProdukLayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = ProdukLayanan::all();

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
        $result = ProdukLayanan::where('idLayanan',$id)->first();

        if($result) 
        {
            //ini perlu diganti
            $user = Auth::user();   
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = ProdukLayanan::where('idLayanan',$id)->delete();

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
            'namaLayanan' => 'required|string',
        ]);
        
        $layanan = new ProdukLayanan;
        //$password = Crypt::encrypt($request->input('password'));

        $layanan->namaLayanan = $request->input('namaLayanan');
        

        //ini perlu diubah
        $user = Auth::user();   
        $layanan->edited_by = $user['idPegawai'];

        if($layanan->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}