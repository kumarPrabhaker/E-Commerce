<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\forget;

class forgetcontroller extends Controller
{

    public function index(){
        return view('forget');
    }
    public function forget(Request $request)
    {
        // // Validate the form data
        // $validator = Validator::make($request->all(), [
        //     'useremail' => 'required|email',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('/for')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Process the form data
//         $email = $request->input('useremail');
// dd( $email);

forget::create([
    'email' => $request->input('useremail'),
     // Use bcrypt for password hashing
]);

        // Implement your logic here, e.g., send reset instructions via email

        // Redirect back with a success message
        return redirect('/')->with('success', 'Reset instructions sent to your email.');
    }
}
