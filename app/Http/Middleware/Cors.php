<?php

namespace TerritoryAdmin\Http\Middleware;

use Closure;

class Cors
{
    /**
     * esta clase fue creada para permitir enviar datos a otros servidores
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request); agregado para permitir enviar datos a otros servidores
        // return $next($request)
        // ->header('Access-Control-Allow-Origin', '*')
        // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        // ->headers('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');


        //modificado para enviar archivos
        $response = $next($request)
        ->header('Access-Control-Allow-Origin' , '*')
        ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');

        return $response;
    }
}
