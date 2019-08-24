<?php namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Territorio;
use TerritoryAdmin\Manzana;
use TerritoryAdmin\Registro;
use Carbon\Carbon;
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
    public function completeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idcongregacion' => 'required',
            'idterritorio' => 'required',
            'conductor' => 'required',
            'localidad' => 'required',
            'numero' => 'required', 
            'manzanas' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        DB::beginTransaction();
        $manzanas_pendientes = Manzana::where('idterritorio', $request->idterritorio)->where('estado', 0)->get();
        $manzanas_terminadas = explode(',', trim($request->manzanas, ","));
        foreach ($manzanas_pendientes as $key => $value) {
            if (in_array($value->letra, $manzanas_terminadas)) {
                $manzana = Manzana::find($value->id);
                $manzana->estado = 1;
                $manzana->save();
            }
        }
        $territorio = Territorio::find($request->idterritorio);
        if (count($manzanas_terminadas) == count($manzanas_pendientes)) {
            $territorio->idestadoterritorio = 3;
        } else {
            $territorio->idestadoterritorio = 2;
        }
        $territorio->save();
        $registro = new Registro();
        $registro->idcongregacion = $request->idcongregacion;
        $registro->numero = $request->numero;
        $registro->localidad = $request->localidad;
        $registro->conductor = $request->conductor;
        $registro->fecha = Carbon::now();
        $registro->manzanas = trim($request->manzanas, ",");
        $registro->observacion = $request->observacion;
        $registro->activo = true;
        $registro->save();
        DB::commit();
        return response()->json(['status' => 'ok', 'message' => 'ok']);
    }
}
