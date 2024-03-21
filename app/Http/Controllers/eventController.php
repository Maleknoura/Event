<?php

namespace App\Http\Controllers;

use App\Http\Requests\eventrequest;
use App\Models\category;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizerQuery = Organiser::where('user_id', Auth::id());
        $organizer = $organizerQuery->first();
        $organizerId = $organizer ? $organizer->id : null;
        $eventsCount = Event::where('organiser_id', $organizerId)->count();

        $eventWithMostReservations = Event::select('events.id', 'events.name', DB::raw('COUNT(reservations.id) as reservations_count'))
            ->leftJoin('reservations', 'events.id', '=', 'reservations.event_id')
            ->where('events.organiser_id', $organizerId)
            ->groupBy('events.id', 'events.name')
            ->orderByDesc('reservations_count')
            ->first();

        $events = Event::where('organiser_id', $organizerId)->with('organizer')->get();
        $reservations = Reservation::where('status', '!=', 'Booked')->get();

        return view('dashboardevent', compact('events', 'organizerId', 'eventsCount', 'eventWithMostReservations', 'reservations'));
    }


    public function view(Request $request)
    {

        $categories = Category::all();
        $categoryId = $request->input('id');

        $query = Event::query();

        if ($categoryId) {
            $query->where('categorie_id', $categoryId);
        }
        $searchTitle = $request->input('search_title');
        if ($searchTitle) {
            $query->where('name', 'like', '%' . $searchTitle . '%');
        }
        $query->where('statut', 'accepted');

        $events = $query->with('category')->paginate(4);
       


        return view('home', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    public function store(eventrequest $request)
    {
        // dd($request);
        $validatedData = $request->validate($request->rules());
        $user = Organiser::where('user_id', Auth::id())->first();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('/public/images', $imageName);


        Event::create([
            'name' => $validatedData['name'],
            'localisation' => $validatedData['localisation'],
            'date' => $validatedData['date'],
            'description' =>  $validatedData['description'],
            'place_available' => $validatedData['place_available'],
            'mode' => $validatedData['mode'],
            'organiser_id' => $user->id,
            'categorie_id' => $validatedData['categorie_id'],
            'image' => $imageName,
        ]);
        return redirect()->back()->with('Success', 'Events SuccessFully Added');
    }

    public function publication(Request $request, $eventId)
    {
        dd($request);
        $event = Event::findOrFail($eventId);
        $event->update([
            'statut' => $request->statut,
        ]);

        return redirect()->back();
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('singlepage', ['event' => $event]);
    }
    /**
     * Display the specified resource.
     */


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


    public function update(Request $request, Event $id)
    {
        // dd($request);
        $request->validate([
            'eventname' => 'required',
            'eventlocalisation' => 'required',
            'eventdescription' => 'required',
            'categorie' => 'required',
            'eventimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eventdate' => 'required',
            'eventplace_available' => 'required',
        ]);

        $image = $request->file('eventimage');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);

        $id->update([
            'name' => $request->eventname,
            'localisation' => $request->eventlocalisation,
            'description' => $request->eventdescription,
            'image' => $imageName,
            'categorie_id' => $request->categorie,
            'date' => $request->eventdate,
            'place_available' => $request->eventplace_available,
        ]);

        return redirect()->back();
    }


    public function updatereservation(Request $request,  $id)
    {

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back();
    }
}
