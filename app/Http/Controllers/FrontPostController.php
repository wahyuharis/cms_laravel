<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontPostController extends Controller
{
    function index()
    {

        $view_data = array();
        $view_data['page_title'] = "Posts";
        $view_data['page_subtitle'] = "Feel Happy to share";

        $post = DB::table('post')
            ->leftJoin('users', 'users.id_users', '=', 'post.id_users')
            ->where('deleted', '=', 0)
            ->where('active', '=', 1)
            ->orderByDesc('post.id_post')
            ->paginate(5);


        $content_data = array();
        $content_data['post'] = $post;

        $content = view('frontend.post', $content_data);

        $view_data['content'] = $content;


        return view('FrontTemplate', $view_data);
    }

    function detail_post($slug)
    {

        // $post_detail = DB::table('post')->where('slug', $slug)->first();

        $post_detail = DB::table('post')
            ->leftJoin('users', 'users.id_users', '=', 'post.id_users')
            ->where('slug', $slug)
            ->first();

        // dd($post_detail);

        $view_data = array();
        $view_data['page_title'] =  "Welcome";
        $view_data['page_subtitle'] = "Simple Blog";



        $content_data = array();
        $content_data['post_detail'] = $post_detail;
        $content = view('frontend.post_detail', $content_data);

        $view_data['content'] = $content;


        return view('FrontTemplate', $view_data);
    }

    function search(Request $request)
    {
        $search = $request->input('search');

        // $db=DB::table('post')->whereRaw();

        $view_data = array();
        $view_data['page_title'] = "Posts";
        $view_data['page_subtitle'] = "Feel Happy to share";

        $post = DB::table('post')
            ->leftJoin('users', 'users.id_users', '=', 'post.id_users')
            ->whereRaw("post.title like  ? ", ["%" . $search . "%"])
            ->orderByDesc('post.id_post')
            ->paginate(5);


        $content_data = array();
        $content_data['post'] = $post;

        $content = view('frontend.post', $content_data);

        $view_data['content'] = $content;


        return view('FrontTemplate', $view_data);
    }
}
