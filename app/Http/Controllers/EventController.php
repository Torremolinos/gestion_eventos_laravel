<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return response()->json($event);
    }
    public function store(Request $request)
    {

        try {
            $request->validate([
                'organizer_id' => 'required|integer',
                'nombre_evento' => 'required|string',
                'ubicacion' => 'required|string',
                'fecha' => 'required|date',
            ]);

            $event = new Event();
            $event->organizer_id = $request->input('organizer_id');
            $event->nombre_evento = $request->input('nombre_evento');
            $event->fecha = $request->input('fecha');
            $event->ubicacion = $request->input('ubicacion');
            $event->save();

            return response()->json($event, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        return response()->json($event);
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

        $event = Event::find($id);
        $event->organizer_id = $request->input('organizer_id');
        $event->nombre_evento = $request->input('nombre_evento');
        $event->fecha = $request->input('fecha');
        $event->ubicacion = $request->input('ubicacion');
        $event->save();

        if (!$event) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }
        return response()->json($event, 200);
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'El evento no está'], 404);
        } else {
            $event->delete();
            return response()->json(['message' => 'Evento eliminado'], 200);
        }
    }
    public function attachParticipant($eventID, $participantId)
    {
        $event = Event::find($eventID);
        $participantId = Participant::find($participantId);

        if (!$event || !$participantId) {
            return response()->json([
                'message' => 'Event or participant not found'
            ], 404);
        }

        $event->participants()->attach($participantId);
        return response()->json([
            'message' => 'Successfully attached participant to event'
        ], 200);
    }

    public function detachParticipant($eventID, $participantId)
    {
        $event = Event::find($eventID);
        $participantId = Participant::find($participantId);
        if (!$event || !$participantId) {
            return response()->json([
                'message' => 'Event or participant not found'
            ], 404);
        }

        $event->participants()->dettach($participantId);
        return response()->json([
            'message' => 'Successfully attached participant to event'
        ], 200);
    }
}
