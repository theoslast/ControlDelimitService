<?php namespace TerritoryAdmin\Http\Controllers\Api;

use Illuminate\Http\Request;
use TerritoryAdmin\Http\Controllers\Controller;
use TerritoryAdmin\Usuario;
use Validator;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json(['status' => 'ok', 'usuarios' => $usuarios ]);
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
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'contrasenia' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        $usuario = new Usuario($request->all());
        $usuario->activo = 1;
        $usuario->save();
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
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['status' => 'error', 'message' => 'Usuario no encontrado' ]);
        }
        return response()->json(['status' => 'ok', 'usuario' => $usuario ]);
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'contrasenia' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);      
        }
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['status' => 'error', 'message' => 'Usuario no encontrado' ]);
        }
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->contrasenia = $request->contrasenia;
        $usuario->save();
        return response()->json(['status' => 'ok', 'message' => 'Usuario actualizado correctamente' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['status' => 'error', 'message' => 'Usuario no encontrado' ]);
        }
        $usuario->delete();
        return response()->json(['status' => 'ok', 'message' => 'Usuario eliminado correctamente' ]);
    }
}
