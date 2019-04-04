<?php

namespace App\Http\Controllers\Componentes;

use Validator;
use App\Componente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Componente::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $componente = Componente::create($request->all());
        return response()->json($componente);

        /*$validator = Validator::make($request->all(), [
            'f003_descripcion' => 'max:100',
            'f003_ind_estado' => 'max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(["errores"=>$validator->errors()]);
        }else {
            $datos = $request->all();
            $componente = componente::create($datos);
            return response()->json($componente);
        }*/
    }

    /*public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f003_descripcion' => 'max:100',
            'f003_ind_estado' => 'max:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            $datos = $request->all();
            componente::create($datos);
            return redirect('/componentescrear');
        }
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Componente $componente)
    {
        return response()->json($componente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Componente $componente)
    {
        $componente->update($request->all());
        return response()->json($componente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        $componente->delete();
        $respuesta = ['msg' => 'Se borro Satisfactoriamente'];
        return response()->json($respuesta,200);
    }
}
