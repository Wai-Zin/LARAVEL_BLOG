<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(Request $request) {
        //dd($request->all());
        $user = User::where('email',$request -> email) -> first();
        //dd($user);
        if( ! $user) {
            return redirect('login');
        }

        $credentials = [
            'email' => $user-> email,
            'password' => $request -> password,
        ];

        if(!Auth::attempt($credentials)) {
            return redirect('login');
        }
        // else {
        //     return 'Login failed';
        // }
        return redirect('posts');

    }
    public function destroy() {
        Auth::logout();
        return redirect('login');
    }
}
