<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(Request $request)
    {
        $view_data = [];
        $view_data['title'] = "Home";
        $view_data['content'] = view('admin.home');

        $data = $request->session()->all();

        $value = $request->session()->get('username');

        return view('admin.template', $view_data);
    }
}
