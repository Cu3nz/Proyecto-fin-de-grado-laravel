<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMaillabe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormulario()
    {
        return view('contactoForm.formularioContacto');
    }

    public function procesarFormulario(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:4'],
            'email' => ['required', 'email'],
            'contenido' => ['required', 'string', 'min:10'],
            'categoriasoporte' => ['required', 'string'],
            'images' => ['nullable', 'array', 'min:1', 'max:10'],
            'images.*' => ['file', 'mimes:jpeg,png,jpg,gif,svg,webp'],
        ]);

        try {
            $imagenes = $request->file('images', []);
            Mail::to('soportetiendacrochet@gmail.com')->send(new ContactoMaillabe(
                $request->nombre,
                $request->email,
                $request->contenido,
                $imagenes,
                $request->categoriasoporte
            ));
        
            if (!Auth::check()) {
                return redirect()->route('welcome')->with('msgEnviado', 'Reporte enviado correctamente, te responderemos en la mayor brevedad posible');
            } else {
                return redirect()->route('dashboard')->with('msgEnviado', 'Reporte enviado correctamente, te responderemos en la mayor brevedad posible');
            }
        } catch (\Exception $ex) {
            if (!Auth::check()) {
                return redirect()->route('welcome')->with('error', 'Error: no se ha podido enviar el mensaje, intentalo de nuevo más tarde');
            } else {
                return redirect()->route('dashboard')->with('error', 'Error: no se ha podido enviar el mensaje, intentalo de nuevo más tarde');
            }
        }
    }
        
}
