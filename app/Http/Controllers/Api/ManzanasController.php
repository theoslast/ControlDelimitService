<?php

namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Manzana;

class ManzanasController extends Controller
{
    public function indexByTerritorio($id)
    {
        $manzanas = Manzana::where('idterritorio', $id)
            ->where('activo', 1)
            ->where('estado', 0)
            ->get();
        if ($manzanas->count() == 0) {
            return response()->json(['status' => 'error', 'message' => 'No tiene manzanas registrados' ]);
        }
        return response()->json(['status' => 'ok', 'manzanas' => $manzanas ]);
    }
    
    //obsoleto
    public function completeManzana($id)
    {
        $manzana = Manzana::find($id);
        if ($manzana->estado == 0) 
            $manzana->estado = 1;        
        $manzana->save();
        return response()->json(['status' => 'ok', 'manzana' => 'complete']);
    }
}
