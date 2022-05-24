<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    //
    function index()
    {
        $view_data = array();
        $view_data['page_title'] = "Contact";
        $view_data['page_subtitle'] = "It's a Pleasure to Meet";
        $view_data['content'] = view('frontend.contact');


        return view('FrontTemplate', $view_data);
    }
}
