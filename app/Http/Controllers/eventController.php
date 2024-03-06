<?php

namespace App\Http\Controllers;

use App\Http\Requests\eventrequest;
use App\Models\Event;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('dashboardevent' , compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EventRequest $request){
        $validatedData = $request->validate($request->rules());

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('public/images'), $imageName);
        } else {
            $imageName = null;
        }

        Event::create([
            'name' => $validatedData['name'],
            'localisation' => $validatedData['localisation'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'date'=> $validatedData['date'],
            'place_available' => $validatedData['place_available']
        ]);

        return redirect()->back();
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
   

        public function update(Request $request , Event $id){
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('public/images'), $imageName);
            } else {
                $imageName = null;
            }
    
            $request->validate([
                'eventname' => 'required',
                'eventlocalisation' => 'required',
                'eventdiscription' => 'required',
                'eventimage' => $imageName,
                'eventdate' => 'required',
                'eventplace_available' => 'required'
            ]);
    
            $id->update([
                'name' => $request->eventname,
                'localisation' => $request->eventlocalisation,
                'description' => $request->eventdiscription,
                'image' => $imageName,
                'date'=> $request->eventdate,
                'place_available' => $request->eventcapacity
            ]);
    
            return redirect()->back();
        }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back();
    }
}
