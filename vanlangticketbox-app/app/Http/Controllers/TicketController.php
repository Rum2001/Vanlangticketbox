<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();

        return response()->json([
            'success' => true,
            'data' => $tickets
        ]);
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $ticket
        ]);
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->event_id = $request->event_id;
        $ticket->name = $request->name; 
        $ticket->price = $request->price;
        $ticket->quantity = $request->quantity;
        $ticket->save();
        return response()->json([
            'success' => true,
            'data' => $ticket
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        $ticket->event_id = $request->event_id;
        $ticket->name = $request->name;
        $ticket->price = $request->price;
        $ticket->quantity = $request->quantity;
        $ticket->save();

        return response()->json([
            'success' => true,
            'data' => $ticket
        ]);
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        $ticket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ticket deleted successfully'
        ]);
    }
}