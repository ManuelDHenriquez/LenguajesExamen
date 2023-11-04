<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contacto;

class contactoController extends Controller
{
    //
    public function contactos(){
        $contactos = contacto::all();
        return view('vercontactos', compact('contactos'));
    }

    public function agregar( $codigoEntrada ){
        return view('agregarcontacto', compact('codigoEntrada'));
    }

    public function store( Request $request ){
        $nuevoContacto = new contacto();
        $nuevoContacto->codigoEntrada = $request->input('codigo');
        $nuevoContacto->nombre = $request->input('nombre');
        $nuevoContacto->apellido = $request->input('apellido');
        $nuevoContacto->telefono = $request->input('telefono');
        $nuevoContacto->save();

        return redirect()->route('directorio.directorio');
    }

    public function delete( $id ){
        $contacto = contacto::find($id);
        return view('eliminar', compact('contacto'));
    }

    public function destroy( $id ){
        $contacto = contacto::find($id);
        $contacto->delete();

        return redirect()->route('directorio.directorio');
    }
}
