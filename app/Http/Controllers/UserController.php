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
        return response()->json(User::all());
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
            'f009_nombre' => 'required|max:50',
            'email' => 'required|email|unique:t009_usuarios,email',
            'password' => 'required|min:6|confirmed',
            'f009_documento' => 'unique:t009_usuarios,f009_documento',
            'f009_tipo_documento' => 'required'
        ]);

        if ($validator->fails()) {
            // return redirect()->back()
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json($validator->errors(),409);
        }else {
            if ($request->file('f009_imagen')) {
                $request['f009_imagen'] = $request->file('f009_imagen')->getClientOriginalName();
                $request->file('f009_imagen')->move(public_path('img'), $pelicula['f009_imagen']);
            }else{
                $pelicula['f009_imagen'] = 'default';
            }
        }
        $datos = $request->all();
        /*echo "<pre>";
        print_r($datos);
        echo "</pre>";
        */
        $datos['password'] = Hash::make($datos['password']);

        $user = User::create($datos);
        return response()->json($user);
        // return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
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
    public function update(Request $request, User $usuario)
    {
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return response()->json(["msg"=>"se borro correctamente","user_delete"=>$usuario]);
    }
}
