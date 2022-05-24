<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class NativeLogin
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
        $password =  $request->session()->get('password');

        $db = DB::table('users')
            ->whereRaw('(users.username = ? or email = ?)', [$username, $username])
            ->get();

        if (count($db)) {
            $dbpass = $db->toArray()[0]->password;
            if (Hash::check($password, $dbpass)) {
                $userdata = (array) $db->toArray()[0];
                session($userdata);
                return  redirect('admin');
            } else {
                redirect('login');
            }
        } else {
            return  redirect('login');
        }

        return $next($request);
    }
}
