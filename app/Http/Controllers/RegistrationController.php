<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegistrationModel;

class RegistrationController extends Controller
{
    function onRegister(Request $request){
        
        $firstname=$request->input('firstname');
        $lastname=$request->input('lastname');
        $email=$request->input('email');
        $username=$request->input('username');
        $password=$request->input('password');
        
        $userCount=RegistrationModel::where('username',$username)->count();
        
        if($userCount!=0){
        return "User Already Exists";
        }else{
            $result=RegistrationModel::insert([
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'email'=>$email,
                'username'=>$username,
                'password'=>$password,
            ]);
            if($result==true){
                return "Registration Successful";
            }else{
                return "Registration Failed";
            }
    }
  }
}
