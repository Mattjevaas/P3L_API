<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Hewan;
use App\Customer;
use App\Jenis_hewan;
use App\Ukuran_hewan;

class HewanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = Hewan::all();
        
        $i = 0;
        foreach ($results as $data)
        {
            $customer = Customer::where('idCustomer_Member',$results[$i]['idCustomer_Member'])->first();
            $jenis_hewan = Jenis_hewan::where('idJenisHewan',$results[$i]['idJenisHewan'])->first();
            $ukuran_hewan = Ukuran_hewan::where('idUkuranHewan',$results[$i]['idUkuranHewan'])->first();

            if($customer && $jenis_hewan && $ukuran_hewan)
            {
                $results[$i]['idCustomer_Member'] =  $customer;
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
        $result = Hewan::where('idHewan',$id)->first();

        if($result) 
        {

            //ini perlu diganti
            $user = Auth::user();   
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = Hewan::where('idHewan',$id)->delete();

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
            'namaHewan' => 'required|string',
            'tglLahir' => 'required',
            'idUkuranHewan' => 'required',
            'idJenisHewan' => 'required',
            'idCustomer_Member' => 'required'
        ]);
        
        $hewan = new Hewan;
        //$password = Crypt::encrypt($request->input('password'));

        $hewan->namaHewan = $request->input('namaHewan');
        $hewan->tglLahir = $request->input('tglLahir');
        $hewan->idUkuranHewan = $request->input('idUkuranHewan');
        $hewan->idJenisHewan = $request->input('idJenisHewan');
        $hewan->idCustomer_Member = $request->input('idCustomer_Member');

        //ini perlu diubah
        $user = Auth::user();   
        $hewan->edited_by = $user['idPegawai'];

        if($hewan->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed','Data' => []],500);
        }
    }

}