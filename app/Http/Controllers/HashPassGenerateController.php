<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashPassGenerateController extends Controller
{
    //
    function index(Request $request)
    {

        $pass = $request->input('pass');
        if (!empty(trim($pass))) {
            echo Hash::make($pass);
        }else{
            echo "masukin ?pass=[newpass]";
        }
    }
}
