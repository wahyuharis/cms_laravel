<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    function login()
    {
        return view('login');
    }

    function logout(Request $request)
    {
        $request->session()->flush();

        return  redirect('login');
    }

    function login_submit(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $db = DB::table('users')
            ->whereRaw('(users.username = ? or email = ?)', [$username, $username])
            ->get();


        if (count($db)) {
            $dbpass = $db->toArray()[0]->password;


            if (Hash::check($password, $dbpass)) {
                $userdata = (array) $db->toArray()[0];
                session($userdata);
                return  redirect('admin');

                // echo "hello";
                // die();
            } else {
                $request->session()->flash('error_message', 'Password Salah!');
                return redirect('login');
            }
        } else {
            $request->session()->flash('error_message', 'User Tidak Dikenali!');

            return  redirect('login');
        }
    }
}
