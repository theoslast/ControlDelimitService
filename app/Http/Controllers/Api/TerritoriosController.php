<?php namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Territorio;
use TerritoryAdmin\Manzana;
use TerritoryAdmin\Registro;
use DB;
use Validator;

class TerritoriosController extends Controller
{
    public function searchTerritorio($idCong, $text)
    {
        $territorios = Territorio::with('estado')
            ->where('idcongregacion', $idCong)
            ->where( function ( $query ) use ($text)
            {
                $query->Where('numero', '=', "$text")
                    ->orWhere('localidad', 'LIKE', "%{$text}%");
            })
            ->orderBy('numero')
            ->get();
        if ($territorios->count() == 0) {
            return response()->json(['status' => 'error', 'message' => 'No hay resultados de su busqueda' ]);
        }
        foreach ($territorios as $key => $value) {
            $value->imagen = url('/imgTerritorios/'. $value->imagen);
        }
        return response()->json(['status' => 'ok', 'territorios' => $territorios]);
    }
    
    public function getTerritorioById($id) 
    {
        $territorio = Territorio::find($id);
        if ($territorio == null) {
            return response()->json(['status' => 'error', 'message' => 'No hay territorio' ]);
        }
        $territorio->imagen = url('/imgTerritorios/'. $territorio->imagen);
        return response()->json(['status' => 'ok', 'territorio' => $territorio]);
    }

    public function indexByCongregacion($id)
    {
        $territorios = Territorio::with('estado')
            ->where('idcongregacion', $id)
            ->where('activo', 1)
            ->get();
        if ($territorios->count() == 0) {
            return response()->json(['status' => 'error', 'message' => 'No tiene territorios registrados' ]);
        }
        foreach ($territorios as $key => $value) {
            $value->imagen = url('/imgTerritorios/'. $value->imagen);
        }
        return response()->json(['status' => 'ok', 'territorios' => $territorios ]);
    }

    //POST:
    public function storeByCongregacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'localidad' => 'required',
            'numero' => 'required',
            'cantidadmanzanas' => 'required',
            'imagen' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        DB::beginTransaction();
        $territorio = new Territorio;
        $territorio->idCongregacion = $request->idCongregacion;
        $territorio->numero = $request->numero;
        $territorio->localidad = $request->localidad;
        $territorio->cantidadmanzanas = $request->cantidadmanzanas;
        $territorio->activo = 1;
        $territorio->imagen = $request->imagen;
        $territorio->idEstadoTerritorio = 1;
        $territorio->save();
        $numM = 65 + $request->cantidadManzanas;
        for($i=65; $i< $numM; $i++) {  
            $manzana = new Manzana;
            $manzana->idTerritorio = $territorio->id;
            $manzana->letra = chr($i); 
            $manzana->estado = 0;
            $manzana->activo = 1;
            $manzana->save(); 
        }
        DB::commit();
        return response()->json(['status' => 'ok', 'message' => 'ok' ]);
    }

    //POST:
    public function completeTerritorio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nombre' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        DB::beginTransaction();
        $territorio = Territorio::find($request->id);
        $territorio->idEstadoTerritorio = 3;
        $territorio->save();
        $manzanas = Manzana::where('idterritorio', $request->id)->get();
        $todo = "";
        foreach ($manzanas as $key => $item) {
            $item->estado = 1;
            $item->save();
            $todo += $item;
        }
        $registro = new Registro();
        $registro->conductor = $request->nombre;
        $registro->fecha = date();
        $registro->activo = true;
        $registro->manzanas = $item;
        $registro->idTerritorio = $request->id;
        $registro->observacion = $request->observacion;
        DB::commit();
        return response()->json(['status' => 'ok', 'message' => 'ok']);
    }
}
