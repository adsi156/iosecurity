<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //return redirect()->intended('dashboard');
        if (Auth::guard('web')->attempt($credentials)) {
            // Authentication passed...
            // $request->session()->regenerate();

            return redirect()->intended('dashboard');
            echo 'aaaaaaaaaaa';
        }else {
            return redirect('login')->with('message', 'Datos incorrectos!');
        }
/*
        if (Auth::attempt($credentials)){
            /*echo "<pre>";
            print_r($credentials);
            echo "</pre>";
            //return redirect('login')->with('message', 'Ingreso!');
            return redirect('dashboard');
        }else {
            return redirect('login')->with('message', 'Datos incorrectos!');
        }*/
    }
}
