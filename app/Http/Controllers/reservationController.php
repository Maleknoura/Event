<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('singlepage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($eventId)
    {

        $event = Event::findOrFail($eventId);
        $client = client::where('user_id', Auth::id())->first();
        if ($event->mode === 'automatique' && $event->place_available > 0) {

            Reservation::create([
                'status' => 'Booked',
                'event_id' => $event->id,
                'client_id' => $client->id,

            ]);
        } else {
            if ($event->mode === 'manuelle' && $event->place_available > 0) {
                // dd($eventId);
                Reservation::create([
                    'status' => 'Available',
                    'event_id' => $event->id,
                    'client_id' => $client->id,
                ]);
            }
        }
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {


        $user = Auth::user()->id;
        $idClient = Client::where('user_id', $user)->first();
        $reservations = Reservation::with('client.user', 'events.organizer')->where('status', 'Booked')
            ->where('client_id', $idClient->id)
            ->get();
        return view('ticket',compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
