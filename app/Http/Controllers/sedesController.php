<?php

namespace App\Http\Controllers;

use App\Sede;
use Illuminate\Http\Request;

class SedesController extends Controller
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
        $sedes = sede::where('f004_nombre','like','%'.$search.'%')->get();
        return response()->json($sedes);
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
            'f004_nombre' => 'required|max:50',
            'f004_descripcion' => 'max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(["errores"=>$validator->errors()]);
        }else {
            $datos = $request->all();
            $sede = Sede::create($datos);
            return response()->json($sede);
        }
    }
    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f004_nombre' => 'required|max:50',
            'f004_descripcion' => 'max:100'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            $datos = $request->all();
            Sede::create($datos);
            return redirect('/sedescrear');
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
    public function update(Request $request,Sede $sede)
    {
        $sede->update($request->all());
        return response()->json($sede);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sede $sede)
    {
        $sede->delete();
        $respuesta = ['msg' => 'Se borro satisfactoriamente'];
        return response()->json($respuesta,200);
        
    }
}
