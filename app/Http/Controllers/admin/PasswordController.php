<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    function index()
    {
        $view_data = [];

        $content = '';

        $content = view('admin.password');

        $view_data['title'] = "Tags";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }

    function submit(Request $request)
    {
        $password1 = $request->input('password');
        $password2 = $request->input('password2');

        $id = $request->session()->get('id_users');

        if ($password1 == $password2) {

            $hashedpassword=Hash::make($password1);

            $update = DB::table('users')
                ->where('users.id_users', $id)
                ->update(['users.password' => $hashedpassword]);
        }


        return redirect('logout');
    }
}
