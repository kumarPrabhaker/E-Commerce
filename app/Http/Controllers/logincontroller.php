<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;

class logincontroller extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Assuming you have a 'login' view
    }

    public function login(Request $request)
    {
        $username= $request->input('username');
        $password= $request->input('password');
        // Implement your login logic here
        //dd($username,$password);
        //dd($password);
        login::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')), // Use bcrypt for password hashing
        ]);
        return view('login');// Assuming you have a 'login' view

    }
    public function logintableabc() {
        
        $datas = login::all();
        return view('logintable', ['datas' => $datas]);
    }
    


    //

    

}
