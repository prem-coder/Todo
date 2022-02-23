<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function loginCheck(Request $req)
    {
        if($req->session()->has('user')) {
            return back();
        } else {
            return view('login');
        }
    }

    public function login(Request $req)
    {
        $validated = $req->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        $result = User::where([
            ['name', '=', $req->username],
            ['password', '=', $req->password]
        ])->pluck('id');

        if(count($result) == 1) {
            $req->session()->put('user', $result[0]);
            return redirect('list');
        } else {
            $req->session()->flash('error', 'Username or Password is Incorrect');
            return redirect('login');
        }
    }

    public function register(Request $req)
    {

        $validated = $req->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5',
            'conf_password' => 'required',
        ]);

        if($req->password == $req->conf_password){
            $result = User::where([
                ['name', '=', $req->username],
                ['password', '=', $req->password]
            ])->get();
    
            if(count($result) == 0) {
                User::create([
                    'name' => $req->username, 'password' => $req->password
                ]);
                return view('login');
            } else {
                $req->session()->flash('error', 'User Already Exists');
                return view('register');
            }
        } else {
            $req->session()->flash('error', 'Password Doesn\'t Match');
            return view('register');
        }
    }

    public function logout(Request $req) {
        $req->session()->pull('user');
        return redirect('login');
    }
}
