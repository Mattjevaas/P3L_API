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
}