<?php

namespace App\Http\Controllers;

use App\Http\Requests\eventrequest;
use App\Models\category;
use App\Models\Event;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $events = Event::where('organiser_id', $organizerId)->with('organizer')->get();
        return view('dashboardevent', compact('events', 'organizerId', 'eventsCount'));
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
