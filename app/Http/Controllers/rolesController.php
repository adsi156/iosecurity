<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\rol;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search="";
        if($request->has("search")){
            $search = $request->search;
        }
        $roles = rol::where('f007_nombre','like','%'.$search.'%')->get();
        return response()->json($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'f007_nombre' => 'required|max:50',
            'f007_descripcion' => 'max:100'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            $datos = $request->all();
            rol::create($datos);
            return redirect('/rolescrear');
        }
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
    public function destroy(Rol $role)
    {
        $role->delete();
        $respuesta = ['msg' => 'Se borro satisfactoriamente'];
        return response()->json($respuesta,200);
        // if($rol){
        // }
        // $error = [ 'msg'=>"No se pudo borrar"];
        // return response()->json($error,404);
    }
}
