<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NativeLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username =  $request->session()->get('username');
        // $password =  $request->session()->get('password');

        $db = DB::table('users')
            ->leftJoin('users_role','users_role.id_users_role','=','users.role')
            ->whereRaw('(users.username = ? or email = ?)', [$username, $username])
            ->first();

            // echo "<pre>";
            // print_r($db);
            // die();
        if($db->users_role_name=='administrator'){
            //pass
        }else{
            $request->session()->flash('error_message', 'Maaf Anda Tidak Memilik Hak Akses Pada Halaman Tsb');
            return redirect('admin/');
        }


        return $next($request);
    }
}
