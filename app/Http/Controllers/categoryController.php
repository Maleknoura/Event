<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryrequest;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(categoryrequest $request)
    {
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryrequest $request)
    {
        $validatedData = $request->validate($request->rules());

        category::create([
            'name' => $validatedData['name']
        ]);

        return redirect('dashboard')->with('success', 'Catégorie créée avec succès');
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
    public function update(Request $request, $categorie_id)
    {

        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);


        $oneCategorie = Category::findOrFail($categorie_id);


        $oneCategorie->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}
