<?php

namespace App\Http\Controllers;

use App\Pet;
use App\User;
use Illuminate\Http\Request;

class petsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pet = Pet::orderBy('created_at', 'desc')->get();
        return view('pages.index', ['pets' => $pet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pet::create($request->only('name', 'description', 'image'));
        $pet = new Pet();
        $pet->name = $request->input('name');
        $pet->description = $request->input('description');
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/uploadedImages', $filename);
        $pet->image = $filename;

        if ( $tp = $request->input('typePet') ) {
            if( $tp == 'birds' || $tp == 'fishs' || $tp == 'reptiles' || $tp == 'mammals' ){
                $pet->type = $tp;
            }
        }
        $pet->save();
        return redirect()->route('pages.index')->with('success', 'Pet has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit($pet)
    {
        $pt = Pet::find($pet);
        return view('pages.edit', ['pets' => $pt]);
    }

    /**
    * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $pet->update( $request->all() );
        return redirect()->route('pages.index')->with('success', 'Pet has been updated successfully ☻');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pet::find($id)->delete();
        return redirect()->route('pages.index')->with('success', 'Pet has been deleted successfully ☻');
    }
}
