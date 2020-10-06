<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    function showLogin()
    {
        return view('login');
    }

    function doLogin(Request $request)
    {

        if (!$request->session()->has('user')) {
            $request->validate([
                'email' => 'bail|required|email',
                'password' => 'required'
            ]);

            $email = $request->get('email');
            $password = md5($request->get('password'));

            $user = DB::table('users')->where([
                ['email', '=', $email],
                ['password', '=', $password]
            ])->first();

            if ($user) {
                $request->session()->put('user', $user);
                return redirect('dashboard');
            } else {
                $request->session()->flash('error', 'Invalid Email or Password');
                return redirect()->back();
            }
        } else {
            return redirect('dashboard');
        }
    }


    function logout(Request $request)
    {
        $request->session()->pull('user');
        return redirect()->intended('');
    }
}
