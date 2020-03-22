<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_all(Request $request)
    {
        $results = Supplier::all();

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
        $result = Supplier::where('idSupplier',$id)->first();

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
        $result = Supplier::where('idSupplier',$id)->first();

        if($result)
        {

            //ini perlu diganti
            $result->edited_by = 1;
            $result->save();

            $result2 = Supplier::where('idSupplier',$id)->delete();

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
            'namaSupplier' => 'required|string',
            'alamat' => 'required|string',
            'noTelp' => 'required|string'
        ]);

        $supplier = new Supplier;
        //$password = Crypt::encrypt($request->input('password'));

        $supplier->namaSupplier = $request->input('namaSupplier');
        $supplier->alamat = $request->input('alamat');
        $supplier->noTelp = $request->input('noTelp');
        $supplier->email = $request->input('email');

        //ini perlu diubah
        $supplier->edited_by = 1;

        if($supplier->save())
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
            'namaSupplier' => 'required|string',
            'alamat' => 'required|string',
            'noTelp' => 'required|string'
        ]);

        $supplier = Supplier::where('idSupplier',$id)->first();

        $supplier->namaSupplier = $request->input('namaSupplier');
        $supplier->alamat = $request->input('alamat');
        $supplier->noTelp = $request->input('noTelp');
        $supplier->email = $request->input('email');

        //ini perlu diubah
        $supplier->edited_by = 1;

        if($supplier->save())
        {
            return response()->json(['Status' => 'Sucess'],200);
        }
        else
        {
            return response()->json(['Status' => 'Failed'],500);
        }
    }
}