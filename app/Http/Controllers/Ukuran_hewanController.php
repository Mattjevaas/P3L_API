<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Ukuran_hewan;

class Ukuran_hewanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = Ukuran_hewan::all();

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
        $result = Ukuran_hewan::where('idUkuranHewan',$id)->first();

        if($result) 
        {

            //ini perlu diganti
            $user = Auth::user();   
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = Ukuran_hewan::where('idUkuranHewan',$id)->delete();

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
            'ukuranHewan' => 'required|string',
        ]);
        
        $ukuran = new Ukuran_hewan;
        //$password = Crypt::encrypt($request->input('password'));

        $ukuran->ukuranHewan = $request->input('ukuranHewan');

        //ini perlu diubah
        $user = Auth::user();   
        $ukuran->edited_by = $user['idPegawai'];

        if($ukuran->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}