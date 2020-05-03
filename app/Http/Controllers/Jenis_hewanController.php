<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Jenis_hewan;
use App\Pegawai;

class Jenis_hewanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = Jenis_hewan::all();

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
        $result = Jenis_hewan::where('idJenisHewan',$id)->first();

        if($result)
        {

            //ini perlu diganti
            $user = Auth::user();
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = Jenis_hewan::where('idJenisHewan',$id)->delete();

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
            'jenisHewan' => 'required|string',
        ]);

        $jenis = new Jenis_hewan;
        //$password = Crypt::encrypt($request->input('password'));

        $jenis->jenisHewan = $request->input('jenisHewan');

        //ini perlu diubah
        $user = Auth::user();
        $jenis->edited_by = $user['idPegawai'];

        if($jenis->save())
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
            'jenisHewan' => 'required|string',
        ]);

        $jenis = Jenis_hewan::where('idJenisHewan',$id)->first();
        //$password = Crypt::encrypt($request->input('password'));

        $jenis->jenisHewan = $request->input('jenisHewan');

        //ini perlu diubah
        $user = Auth::user();
        $jenis->edited_by = $user['idPegawai'];

        if($jenis->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }
}
