<?php

namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Registro;
use Carbon\Carbon;
use Validator;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByCongregacion($idCong)
    {
        $registros = Registro::all()
            ->where('idCongregacion', $idCong)
            ->where('activo', 1);
        return response()->json(['status' => 'ok', 'registros' => $registros]);
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
    //+++++++++++obsoleto
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idcongregacion' => 'required',
            'conductor' => 'required',
            'manzanas' => 'required',
            'numero' => 'required',
            'localidad' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        $registro = new Registro;
        $registro->fecha = Carbon::now();
        $registro->numero = $request->numero;
        $registro->idcongregacion = $request->idcongregacion;
        $registro->localidad = $request->localidad;
        $registro->manzanas = $request->manzanas;
        $registro->conductor = $request->conductor;
        $registro->observacion = $request->observacion;
        $registro->activo = 1;
        $registro->save();
        return response()->json(['status' => 'ok', 'message' => 'ok' ]);
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
