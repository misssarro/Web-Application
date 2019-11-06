<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Enclosure;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $animals = Animal::paginate(10);
        return view('animals.index',['animals' => $animals]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enclosures=Enclosure::orderBy('name','asc')->get();
        return view('animals.create',['enclosures' => $enclosures]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData= $request->validate([
             'name' => 'required|max:255',
             'HP'=> 'nullable|date',
             'type'=> 'required|max:255',
             'enclosure_id'=> 'required|integer',
        ]);
        $a =new Animal;
        $a->name= $validatedData['name'];
        $a->HP= $validatedData['HP'];
        $a->type= $validatedData['type'];
        $a->enclosure_id= $validatedData['enclosure_id'];
        $a->save();

        session()->flash('message','Animal was created');
        return redirect()->route('animals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $animal=Animal::findOrFail($id);
        return view('animals.show',['animal' =>$animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $animal =Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animals.index')->with('message','Animal was deleted');

    }
}
