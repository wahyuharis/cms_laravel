<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontAboutController extends Controller
{
    //
    function index(){

        $view_data=array();
        $view_data['page_title']="About";
        $view_data['page_subtitle']="About Me";
        $view_data['content']=view('frontend.about');


        return view('FrontTemplate',$view_data);
    }
}
