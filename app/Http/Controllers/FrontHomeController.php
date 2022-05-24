<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontHomeController extends Controller
{
    //
    function index()
    {

        $view_data = array();
        $view_data['page_title'] = "Welcome";
        $view_data['page_subtitle'] = "To Simple Blog";

        $post = DB::table('post')
            ->leftJoin('users', 'users.id_users', '=', 'post.id_users')
            ->orderByDesc('post.id_post')
            ->limit(5)
            ->get();


        $content_data = array();
        $content_data['post'] = $post;

        $content = view('frontend.home', $content_data);

        $view_data['content'] = $content;


        return view('FrontTemplate', $view_data);
    }
}
