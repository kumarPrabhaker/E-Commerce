<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;




class registercontroller extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Assuming you have a "register.blade.php" view file
    }

    public function register(Request $request)
    {
        $data= $request->all();
        //dd($data);
        // Validate the form data
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'username' => 'required',
        //     'password' => 'required|min:6',
        // ]);

        // Create a new registration record
        Register::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')), // Use bcrypt for password hashing
        ]);
       // dd($data);
        // Redirect or show a success message
        return redirect('rega');
        //return redirect('/')->with('success', 'Registration successful! Please log in.');
    }

    public function registertableabc() {
        $data = Register::all();
        // $data1 = $data->get('password');
        $data1 = $data->pluck('password')->first();

        //dd($data1);
        return view('registertable', ['data' => $data]);
    }
    
    





}
