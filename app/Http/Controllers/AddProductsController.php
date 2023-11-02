<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddProductsController extends Controller
{
    //creating a function for connection
    public function products(){
        return view('addproducts');
    }
}
