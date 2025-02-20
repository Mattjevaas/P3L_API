<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    protected function respondWithToken($token)
    {
        return response()->json([
            'Status' => 'Success',
            'Token' => $token,
            'Token_type' => 'bearer',
            'Expires_in' => Auth::factory()->getTTL() * 1800
        ], 200);
    }
}
