<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\client;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesCount = Category::count();
        $clientsCount = client::count();
        $organizersCount = Organiser::count();
        $eventsCount = Event::count();
        $cat = category::all();
        $users = User::all();
        $event = Event::where('statut', 'pending')->get();
        
        return view('dashboard', compact('categoriesCount', 'clientsCount', 'organizersCount', 'eventsCount', 'cat', 'users', 'event'));
    }

    public function validateEvent(Event $event)
    {
        $event->update(['status' => true]);

        return redirect()->back()->with('success', 'Event validated successfully.');
    }


    public function toggleStatus(Request $request, User $user)
    {
        // dd($request);
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $user->update(['status' => !$user->status]);
        // dd($user->status);
        if ($user->status === true) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized. User is banned.']);
        }

        return back()->with('success', 'User status updated successfully.');
    }

    public function publication(Request $request, $eventId)
    {
        // dd($request);
        $event = Event::findOrFail($eventId);
        $event->update([
            'statut' => $request->statut,
        ]);

        return redirect()->back();
    }
    public function rejectEvent(Request $request,$id)
{
     dd($request);
    $event = Event::findOrFail($id);
    $event->update([
        'statut' => $request->statut,
    ]);
    return redirect()->back()->with('success', 'Event rejected successfully.');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
