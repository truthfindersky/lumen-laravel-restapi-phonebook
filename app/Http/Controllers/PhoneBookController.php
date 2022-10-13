<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Illuminate\Http\Request;

use App\Models\PhoneBookModel;

class PhoneBookController extends Controller
{
    function onInsert(Request $request){

        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        //return response()->json($decoded_array);
        $user=$decoded_array['user'];
        //return $user;
        $phone=$request->input('phone');
        $email=$request->input('email');

        $result=PhoneBookModel::insert([
            'username'=>$user,
            'phone'=> $phone,
            'email'=>$email
        ]);
        if($result==true){
            return "Save Success";
        }else{
            return "Failed Insert";
        }
    }

    function onSelect(Request $request){

        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $user=$decoded_array['user'];

        $result=PhoneBookModel::where('username',$user)->get();

        return $result;
    }
    function onDelete(Request $request){

        $email=$request->input('email');
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $user=$decoded_array['user'];
        
        $result=PhoneBookModel::where(['username'=>$user, 'email'=>$email])->delete();

        if($result==true){
            return "Delete Success";
        }else{
            return "Delete Failed";
        }
    }
}
