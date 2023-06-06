<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|string|min:6',
        ]);

        $dadosValidados['senha'] = Hash::make($dadosValidados['senha']);

        $usuario = Usuario::create($dadosValidados);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);

        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $dadosValidados = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'senha' => 'nullable|string|min:6',
        ]);

        if (isset($dadosValidados['senha'])) {
            $dadosValidados['senha'] = Hash::make($dadosValidados['senha']);
        }

        $usuario->update($dadosValidados);

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return response()->json(null, 204);
    }
}