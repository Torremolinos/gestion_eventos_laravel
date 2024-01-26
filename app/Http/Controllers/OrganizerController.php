<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;


class OrganizerController extends Controller
{
        public function index()
        {
            $organizador = Organizer::all();
            return response()->json($organizador);
        }
        public function store(Request $request)
        {
    
            try {
                $request->validate([
                    // 'id' => 'required|integer',
                    'nombre' => 'required|string',
                    'contacto' => 'required|string',
                ]);
    
                $organizador = new Organizer();
                // $organizador->organizer_id = $request->input('organizer_id');
                $organizador->nombre = $request->input('nombre');
                $organizador->contacto = $request->input('contacto');
                $organizador->save();
    
                return response()->json($organizador, 201);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error'], 500);
            }
        }
    
        public function show($id)
        {
            $organizador = Organizer::find($id);
    
            if (!$organizador) {
                return response()->json(['message' => 'Organizador no encontrado'], 404);
            }
    
            return response()->json($organizador);
        }
    
        public function update(Request $request, $id)
        {
            // Validar los datos del usuario
            $request->validate([
                'nombre' => 'required|string',
                'contacto' => 'required|string',
            ]);
    
            $organizador = Organizer::find($id);
    
            if (!$organizador) {
                return response()->json(['message' => 'Organizador no encontrado'], 404);
            }
    
            // $organizador->update($request->all());
            $organizador->nombre = $request->input('nombre');
            $organizador->contacto = $request->input('contacto');
            $organizador->save();
            return response()->json($organizador, 200);
        }
    
        public function destroy($id)
        {
            $organizador = Organizer::find($id);
    
            if (!$organizador) {
                return response()->json(['message' => 'El organizador no está'], 404);
            } else {
                $organizador->delete();
                return response()->json(['message' => 'Organizador eliminado'], 200);
            }
        }
}
