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
        return redirect ('/int');
        //return view('login');// Assuming you have a 'login' view

    }
    public function logintableabc() {
        
        $datas = login::all();
        return view('logintable', ['datas' => $datas]);
    }
    


    
    // public function update(Request $request, $id)
    // {
    //     // Get the updated data from the request
    //     $data = $request->all();
        
    //     // Find the user by ID
    //    // $user = User::find($id);

    //     // Update the user's data
    //    // $user->update($data);

    //     // Return a response, e.g., a success message
    //     return response()->json(['message' => 'User updated successfully']);
    // }
    
//for deletion

    public function destroy(Request $request ,$id)
    {
        $data = login::find($id);
        //dd($data);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }

//for updation

public function update(Request $request, $id)
{
    // Validate and update the data
    $data = login::findOrFail($id);
    $data->update($request->all());

    return response()->json(['message' => 'Data updated successfully']);
}


}
