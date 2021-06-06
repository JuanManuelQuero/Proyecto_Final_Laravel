<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!isset($request->localidad)) $request->localidad = "%";
        $localidades = Usuario::orderBy('localidad')->distinct()->get('localidad');
        $usuario = Usuario::orderBy('nomusu')
        ->orderBy('localidad')
        ->localidad($request->localidad)
        ->paginate(5);
        return view('usuarios.index', compact('usuario', 'localidades', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misPerfiles = Perfil::getId();
        return view('usuarios.create', compact('misPerfiles'));
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
            'nomusu' => ['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu'],
            'mail' => ['required', 'string', 'unique:usuarios,mail'],
            'localidad' => ['required', 'string', 'min:3', 'max:50'],
            'perfil_id' => ['required']
        ]);

        try {
            Usuario::create($request->all());
            return redirect()->route('usuarios.index')->with('mensaje', 'Usuario creado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $misPerfiles = Perfil::getId();
        return view('usuarios.edit', compact('usuario', 'misPerfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu'.$usuario->id],
            'mail' => ['required', 'string', 'unique:usuarios,mail'.$usuario->id],
            'localidad' => ['required', 'string', 'min:3', 'max:50'],
            'perfil_id' => ['required']
        ]);

        try {
            $usuario->update($request->all());
            return redirect()->route('usuarios.index')->with('mensaje', 'Usuario actualizado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('mensaje', 'Usuario borrado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('usuarios.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }
}
