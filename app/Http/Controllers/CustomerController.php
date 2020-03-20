<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
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
            return response()->json(['Status' => 'Failed'],500);
        }
    }

    public function get_specify(Request $request, $id=null)
    {
        $result = Customer::where('idCustomer_Member',$id)->first();

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
        $result = Customer::where('idCustomer_Member',$id)->first();

        if($result)
        {

            //ini perlu diganti
            $result->edited_by = 2;
            $result->save();

            $result2 = Customer::where('idCustomer_Member',$id)->delete();

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
        $customer->edited_by = 2;

        if($customer->save())
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
        $customer->edited_by = 2;

        if($customer->save())
        {
            return response()->json(['Status' => 'Sucess'],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }

    
}