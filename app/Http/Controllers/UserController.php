<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f011_nombre' => 'required|max:50',
            'email' => 'required|email|unique:t011_usuarios,email',
            'password' => 'required|min:6|confirmed',
            'f011_documento' => 'unique:t011_usuarios,f011_documento',
            'f011_tipo_documento' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            if ($request->file('f011_imagen')) {
                $request['f011_imagen'] = $request->file('f011_imagen')->getClientOriginalName();
                $request->file('f011_imagen')->move(public_path('img'), $pelicula['f011_imagen']);
            }else{
                $pelicula['f011_imagen'] = 'default';
            }
        }
        $datos = $request->all();
        /*echo "<pre>";
        print_r($datos);
        echo "</pre>";
        */
        $datos['password'] = Hash::make($datos['password']);

        User::create($datos);
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
