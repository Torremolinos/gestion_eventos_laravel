<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        return response()->json($participant);
    }
    public function store(Request $request)
    {

        try {
            $request->validate([
                // 'id' => 'required|integer',
                'nombre' => 'required|string',
                'email' => 'required|string',
            ]);

            $participant = new Participant();
            // $organizador->id = $request->input('id');
            $participant->nombre = $request->input('nombre');
            $participant->email = $request->input('email');
            $participant->save();

            return response()->json($participant, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show($id)
    {
        $participant = Participant::find($id);

        if (!$participant) {
            return response()->json(['message' => 'Participante no encontrado'], 404);
        }

        return response()->json($participant);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del usuario
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|string',
        ]);

        $participant = Participant::find($id);

        if (!$participant) {
            return response()->json(['message' => 'Participante no encontrado'], 404);
        }

        // $organizador->update($request->all());
        $participant->nombre = $request->input('nombre');
        $participant->email = $request->input('email');
        $participant->save();
        return response()->json($participant, 200);
    }

    public function destroy($id)
    {
        $participant = Participant::find($id);

        if (!$participant) {
            return response()->json(['message' => 'El participante no está'], 404);
        } else {
            $participant->delete();
            return response()->json(['message' => 'Participante eliminado'], 200);
        }
    }
}
