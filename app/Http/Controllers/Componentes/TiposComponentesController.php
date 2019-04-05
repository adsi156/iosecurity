<?php

namespace App\Http\Controllers\Componentes;

use App\TipoComponente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TiposComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return response()->json(TipoComponente::all());

        $search="";
        if($request->has("search")){
            $search = $request->search;
        }
        $tipo = TipoComponente::where('f002_descripcion','like','%'.$search.'%')->get();
        return response()->json($tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoComp = TipoComponente::create($request->all());
        return response()->json($tipoComp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoComponente $tipoComp)
    {
        return response()->json($tipoComp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoComponente $tipoComp)
    {
        $tipoComp->update($request->all());
        return response()->json($tipoComp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoComponente $tipoComp)
    {
        $tipoComp->delete();
    }
}
