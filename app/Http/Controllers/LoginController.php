<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)){
            /*echo "<pre>";
            print_r($credentials);
            echo "</pre>";*/
            //return redirect('login')->with('message', 'Ingreso!');
            return redirect()->intended('dashboard');
        }else {
            return redirect('login')->with('message', 'Datos incorrectos!');
        }
    }
}
