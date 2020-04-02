<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use App\Pegawai;

class LoginController extends Controller
{
    public function create_password(Request $request,$password)
    {
        // $value = Crypt::encrypt($password);
        // $value2 = Crypt::decrypt($value);
        // echo $value2.' '.$password.' '.$value;

        $value = app('hash')->make($password);
        echo $value;
    }

    public function profile(Request $request)
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function login_user(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) 
        {
            return response()->json(['Status' => 'Failed', 'Token' => 'N/A'],401);
        }

        return $this->respondWithToken($token);

        return response()->json(['Status' => 'Failed', 'Token' => 'N/A'],401);
    }
}