<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {

      $data = [];
     


      if (! $token = auth()->attempts($request->only('no_hp', 'password'))) {//its same wkwkwk
          
        return response()->json(['error' => 'Unauthorized'], 401);
        
      }

      $data['token'] = $token;
      $data['user'] = Auth::user();

      return response()->json([
         'response_code' => '00',
         'response_message' => 'user berhasil login' ,
         'data'    => $data,
         'token' => $token,

       ], 200);
    }


}
