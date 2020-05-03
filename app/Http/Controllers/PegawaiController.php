<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Pegawai;

class PegawaiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = Pegawai::all();

        $i = 0;
        foreach ($results as $data)
        {

            $pegawai = Pegawai::where('idPegawai',$results[$i]['edited_by'])->first();

            $results[$i]['edited_by'] = $pegawai['namaPegawai'];

            $i++;
        }

        if($results)
        {
            return response()->json(['Status' => 'Sucess', 'Data' => $results],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }

    public function get_specify(Request $request, $id=null)
    {
        $result = Pegawai::where('idPegawai',$id)->first();

        if($result)
        {
            return response()->json(['Status' => 'Sucess', 'Data' => $result],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }

    public function delete_specify(Request $request, $id=null)
    {
        $result = Pegawai::where('idPegawai',$id)->first();

        if($result)
        {

            //ini perlu diganti
            $user = Auth::user();
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = Pegawai::where('idPegawai',$id)->delete();

            if($result2)
                return response()->json(['Status' => 'Sucess'],200);
            else
                return response()->json(['Status' => 'Failed'],500);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|string',
            'namaPegawai' => 'required|string',
            'alamat' => 'required|string',
            'tglLahir' => 'required',
            'noTelp' => 'required|string',
            'jabatan' => 'required|string',
            'password' => 'required|string'
        ]);

        $pegawai = new Pegawai;
        //$password = Crypt::encrypt($request->input('password'));

        $pegawai->namaPegawai = $request->input('namaPegawai');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->tglLahir = $request->input('tglLahir');
        $pegawai->noTelp = $request->input('noTelp');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->email = $request->input('email');
        $pegawai->password = app('hash')->make($request->input('password'));

        //ini perlu diubah
        $user = Auth::user();
        $pegawai->edited_by = $user['idPegawai'];

        if($pegawai->save())
        {
            return response()->json(['Status' => 'Sucess'],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }

    public function edit_specify(Request $request,$id)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'namaPegawai' => 'required|string',
            'alamat' => 'required|string',
            'tglLahir' => 'required',
            'noTelp' => 'required|string',
            'jabatan' => 'required|string',
        ]);

        $pegawai = Pegawai::where('idPegawai',$id)->first();

        $pegawai->namaPegawai = $request->input('namaPegawai');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->tglLahir = $request->input('tglLahir');
        $pegawai->noTelp = $request->input('noTelp');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->email = $request->input('email');

        //ini perlu diubah
        $user = Auth::user();
        $pegawai->edited_by = $user['idPegawai'];

        if($pegawai->save())
        {
            return response()->json(['Status' => 'Sucess'],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }

}
