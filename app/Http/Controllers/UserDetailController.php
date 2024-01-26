<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{
   
    public function index()
    {
        $userDetail = UserDetail::all();
        return response()->json($userDetail);
    }
    public function store(Request $request)
    {
                                     /*PREGUNTAR A GUILLE SI PEDIMOS EL USER_ID O SE AUTOGENERA.*/
        try {
            $request->validate([
                'user_id' => 'required|integer', // 'user_id' => 'required|integer
                'direccion' => 'required|string',
                'telefono' => 'required|string',       
            ]);
                                                                    /*PREGUNTAR A GUILLE SI PEDIMOS EL USER_ID O SE AUTOGENERA.*/
            $userDetail = new UserDetail();
            $userDetail->user_id = $request->input('user_id');
            $userDetail->direccion = $request->input('direccion');
            $userDetail->telefono = $request->input('telefono');
            $userDetail->save();

            return response()->json($userDetail, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show($id)
    {
        $userDetail = UserDetail::find($id);

        if (!$userDetail) {
            return response()->json(['message' => 'Detalles de usuario no encontrados'], 404);
        }

        return response()->json($userDetail);
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

        $userDetail = UserDetail::find($id);
        $userDetail->user_id = $request->input('user_id');
        $userDetail->direccion = $request->input('direccion');
        $userDetail->telefono = $request->input('telefono');
        $userDetail->save();

        if (!$userDetail) {
            return response()->json(['message' => 'Los detalles del usuario no se han encontrado'], 404);
        }
        return response()->json($userDetail, 200);
    }

    public function destroy($id)
    {
        $userDetail = UserDetail::find($id);

        if (!$userDetail) {
            return response()->json(['message' => 'Los detalles del usuario no estan'], 404);
        } else {
            $userDetail->delete();
            return response()->json(['message' => 'Detalles del usuario eliminados'], 200);
        }
    }
}


