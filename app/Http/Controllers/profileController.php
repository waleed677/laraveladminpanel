<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class profileController extends Controller
{

    function getId($request)
    {
        $data = $request->session()->get('user');
        return $data->id;
    }

    function index(Request $request)
    {

        $id = $this->getId($request);

        $data = DB::table('users')->where('id', $id)->first();
        if ($data) {
            return view('profile', ['data' => $data]);
        }
    }

    function updateProfile(Request $request)
    {
        $id = $this->getId($request);
        if ($request->submit == 'Update Profile') {

            $request->validate([
                'name' => 'required',
                'email' => 'required|bail|email'
            ]);

            $email = $request->get('email');
            $name = $request->get('name');

            $data = array(
                'name' => $name,
                'email' => $email
            );

            DB::table('users')->where('id', $id)->update($data);
            $message = "Profile Updated Successfully!";
        }
        if ($request->submit == 'Update Password') {

            $request->validate([
                'password' => 'required',
                'cpassword' => 'required|same:password'
            ]);

            echo $password = md5($request->get('password'));

            DB::table('users')->where('id', $id)->update(['password' => $password]);
            $message = "Password Changed Successfully!";
        }

        return redirect('profile')->with('message', $message);
    }
}
