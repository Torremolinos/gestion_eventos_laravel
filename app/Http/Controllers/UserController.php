<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
    public function store(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string',              
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();

            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del usuario
        // $request->validate([
        //     'organizer_id' => 'required|integer',
        //     'nombre_evento' => 'required|string',
        //     'ubicacion' => 'required|string',
        //     'fecha' => 'required|date',
        // ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'El usuario no está'], 404);
        } else {
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado'], 200);
        }
    }
}
