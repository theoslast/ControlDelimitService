<?php

namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Estado;

class EstadosController extends Controller
{
    public function index()
    {
        $estados = Estado::all();
        return response()->json(['status' => 'ok', 'estados' => $estados ]);
    }

    public function show($id)
    {
        $estado = Estado::find($id);
        return response()->json(['status' => 'ok', 'estado' => $estado ]);
    }
}
