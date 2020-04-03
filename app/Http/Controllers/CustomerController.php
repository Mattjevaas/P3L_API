<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Customer;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function fetch_all(Request $request)
    {
        $results = Customer::all();

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
        $result = Customer::where('idCustomer_Member',$id)->first();

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
        $result = Customer::where('idCustomer_Member',$id)->first();

        if($result) 
        {

            //ini perlu diganti
            $user = Auth::user();   
            $result->edited_by = $user['idPegawai'];
            $result->save();

            $result2 = Customer::where('idCustomer_Member',$id)->delete();

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
            'email' => 'required|string',
            'namaCustomer' => 'required|string',
            'alamat' => 'required|string',
            'tglLahir' => 'required',
            'noTelp' => 'required|string'
        ]);

        $customer = new Customer;
        //$password = Crypt::encrypt($request->input('password'));

        $customer->namaCustomer = $request->input('namaCustomer');
        $customer->alamat = $request->input('alamat');
        $customer->tglLahir = $request->input('tglLahir');
        $customer->noTelp = $request->input('noTelp');
        $customer->email = $request->input('email');

        //ini perlu diubah
        $user = Auth::user();   
        $result->edited_by = $user['idPegawai'];

        if($customer->save())
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
            'email' => 'required|string',
            'namaCustomer' => 'required|string',
            'alamat' => 'required|string',
            'tglLahir' => 'required',
            'noTelp' => 'required|string'
        ]);

        $customer = Customer::where('idCustomer_Member',$id)->first();

        $customer->namaCustomer = $request->input('namaCustomer');
        $customer->alamat = $request->input('alamat');
        $customer->tglLahir = $request->input('tglLahir');
        $customer->noTelp = $request->input('noTelp');
        $customer->email = $request->input('email');

        //ini perlu diubah
        $user = Auth::user();   
        $result->edited_by = $user['idPegawai'];

        if($customer->save())
        {
            return response()->json(['Status' => 'Success', 'Data' => []],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed', 'Data' => []],500);
        }
    }

    
}