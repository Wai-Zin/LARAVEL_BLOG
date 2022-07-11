<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request) {
        //dd($request->all());
        $user = User::where('email',$request -> email) -> first();
        //dd($user);
        if( ! $user) {
             throw  ValidationException::withMessages([
                'email' => 'The Email is not registered.'
            ]);
            return redirect('login');
        }

        $credentials = [
            'email' => $user-> email,
            'password' => $request -> password,
        ];

        if(!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'The Email or password is incorrect.'
            ]);
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
