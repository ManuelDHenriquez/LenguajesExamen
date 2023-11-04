<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\directorio;
use App\Models\contacto;

class directorioController extends Controller
{
    //
    public function directorio(){
        $directorios = directorio::all();
        return view('directorio',  compact('directorios'));
    }

    public function crear(){
        return view('crearEntrada');
    }

    public function store( Request $request ){
        $entrada = new directorio();
        $entrada->codigoEntrada = $request->input('codigo');
        $entrada->nombre = $request->input('nombre');
        $entrada->apellido = $request->input('apellido');
        $entrada->telefono = $request->input('telefono');
        $entrada->correo = $request->input('correo');
        $entrada->save();

        return redirect()->route('directorio.directorio');
    }

    public function buscar(){
        return view('buscar');
    }

    public function search( Request $request ){
        $busqueda = directorio::where('correo', '=', $request->input('correo'))->get();
        $id = $busqueda[0]["codigoEntrada"];
        $contactos = contacto::where('codigoEntrada', '=', $id)->get();
        return view('vercontactos', compact('busqueda', 'contactos'));
    }
}
