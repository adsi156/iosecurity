<?php

namespace App\Http\Controllers\Componentes;

use Validator;
use App\ComponenteConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComponentesConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*return response()->json(ComponenteConfig::all());*/

        $search="";
        if($request->has("search")){
            $search = $request->search;
        }
        $configcomponentes = ComponenteConfig::where('f007_nombre','like','%'.$search.'%')->get();
        return response()->json($configcomponentes);
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$config = ComponenteConfig::create($request->all());
        return response()->json($config);*/

        $validator = Validator::make($request->all(), [
            'f007_nombre' => 'max:100',
            'f007_descripcion' => 'max:200',
            'f007_valor_on_off' => 'max:10',
            'f007_valor_temp' => 'max:10',
            'f007_id_componente' => 'max:10'
        ]);

        if ($validator->fails()) {
            return response()->json(["errores"=>$validator->errors()]);
        }else {
            $datos = $request->all();
            $configcomponente = ComponenteConfig::create($datos);
            return response()->json($configcomponente);
        }
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f007_nombre' => 'max:100',
            'f007_descripcion' => 'max:200',
            'f007_valor_on_off' => 'max:10',
            'f007_valor_temp' => 'max:10',
            'f007_id_componente' => 'max:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            $datos = $request->all();
            ComponenteConfig::create($datos);
            return redirect('/configcomponentescrear');
        }
    }
      

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ComponenteConfig $configcomponente)
    {
        return response()->json($configcomponente);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComponenteConfig $configcomponente)
    {
        $configcomponente->update($request->all());
        return response()->json($configcomponente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComponenteConfig $configcomponente)
    {
        $configcomponente->delete();
        $respuesta = ['msg' => 'Se borro Satisfactoriamente'];
        return response()->json($respuesta,200);
    }
}
