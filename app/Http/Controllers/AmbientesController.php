<?php

namespace App\Http\Controllers;

use Validator;
use App\Ambiente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmbientesController extends Controller
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
        $ambientes = ambiente::where('f005_nombre','like','%'.$search.'%')->get();
        return response()->json($ambientes);
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
        /*$ambiente = Ambiente::create($request->all());
        return response()->json($ambiente);*/

        $validator = Validator::make($request->all(), [
            'f005_nombre' => 'required|max:50',
            'f005_descripcion' => 'max:100',
            'f005_capacidad' => 'max:10',
            'f005_id_sede' => 'max:10'
        ]);

        if ($validator->fails()) {
            return response()->json(["errores"=>$validator->errors()]);
        }else {
            $datos = $request->all();
            $ambiente = ambiente::create($datos);
            return response()->json($ambiente);
        }
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f005_nombre' => 'required|max:50',
            'f005_descripcion' => 'max:100',
            'f005_capacidad' => 'max:10',
            'f005_id_sede' => 'max:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            $datos = $request->all();
            ambiente::create($datos);
            return redirect('/ambientescrear');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ambiente $ambiente)
    {
        return response()->json($ambiente);
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
    public function update(Request $request, Ambiente $ambiente)
    {
        $ambiente->update($request->all());
        return response()->json($ambiente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();
        $respuesta = ['msg' => 'Se borro Satisfactoriamente'];
        return response()->json($respuesta,200);
    }
}
