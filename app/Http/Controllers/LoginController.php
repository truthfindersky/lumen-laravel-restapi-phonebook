<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Illuminate\Http\Request;

use App\Models\RegistrationModel;

class LoginController extends Controller
{
    function tokenTest(){
        return "Token is OK";
    }//error message -> app/Http/Middleware/Authenticate.php

    function onLogin(Request $request){

        $username=$request->input('username');
        $password=$request->input('password');

        $userCount=RegistrationModel::where(['username'=>$username, 'password'=>$password])->count();

        if($userCount==1){

            $key = env('TOKEN_KEY'); //.env
            $payload = array(
                "site" => "http://yoursite.com",
                "user" => $username,
                "iat" => time(),
                "exp" => time()+3600 
            );

            $jwt = JWT::encode($payload, $key, 'HS256');

            return response()->json(['Token' => $jwt, 'Status' => 'Login Success']);
        }else{
            return "Wrong Username or Password";
        }
    }
}
