<?php namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Congregacion;
use Validator;

class CongregacionesController extends Controller
{
    //POST: 
    public function loginByCongregacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        $congregacion = Congregacion::where('codigo', $request->codigo)
            ->where('password', $request->password)
            ->where('activo', 1)
            ->first();
        if (!$congregacion) {
            return response()->json(['status' => 'error', 'message' => 'No se encontro ningun registro' ]);
        }
        $congregacion->imagen = url('/imgCongregaciones/'. $congregacion->imagen);
        return response()->json(['status' => 'ok', 'congregacion' => $congregacion ]);
    }
}
