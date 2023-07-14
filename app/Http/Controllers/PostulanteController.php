<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return view('postulantes.index', compact('postulantes'));
    }

    public function create()
    {
        return view('postulantes.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos');
            $postulante->foto = $path;
        }
        $postulante = new Postulante([
            'apellido' => $request->input('apellido'),
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'fecha_matricula' => $request->input('fecha_matricula'),
            'domicilio' => $request->input('domicilio'),
            // Lógica para guardar la foto aquí

        ]);

        $postulante->save();

        return redirect()->route('postulantes.index');
    }

    public function show(Postulante $postulante)
    {
        return view('postulantes.show', compact('postulante'));
    }

    public function edit(Postulante $postulante)
    {
        return view('postulantes.edit', compact('postulante'));
    }

    public function update(Request $request, Postulante $postulante)
    {
        $postulante->update([
            'apellido' => $request->input('apellido'),
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'fecha_matricula' => $request->input('fecha_matricula'),
            'domicilio' => $request->input('domicilio'),
            // Lógica para actualizar la foto aquí
        ]);

        return redirect()->route('postulantes.index');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();

        return redirect()->route('postulantes.index');
    }
}
