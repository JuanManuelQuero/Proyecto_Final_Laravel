<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombres['%'] = "Todos";
        $nombres[1] = "A-F";
        $nombres[2] = "G-M";
        $nombres[3] = "N-T";
        $nombres[4] = "U-Z";


        $perfil = Perfil::orderBy('nombre')
        ->nombre($request->nombre)
        ->paginate(5);
        return view('perfiles.index', compact('perfil', 'nombres', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:30', 'unique:perfils,nombre'],
            'descripcion' => ['required', 'string', 'min:10', 'max:200']
        ]);

        try {
            Perfil::create($request->all());
            return redirect()->route('perfiles.index')->with('mensaje', 'Perfil creado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('perfiles.index')->with('mensaje', 'Error: ' .$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfile)
    {
        return view('perfiles.show', compact('perfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfile)
    {
        return view('perfiles.edit', compact('perfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfile)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:30', 'unique:perfils,nombre'.$perfile->id],
            'descripcion' => ['required', 'string', 'min:10', 'max:200']
        ]);

        try {
            $perfile->update($request->all());
            return redirect()->route('perfiles.index')->with('mensaje', 'Perfil actualizado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('perfiles.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfile)
    {
        try {
            $perfile->delete();
            return redirect()->route('perfiles.index')->with('mensaje', 'Perfil eliminado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('perfiles.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }
}
