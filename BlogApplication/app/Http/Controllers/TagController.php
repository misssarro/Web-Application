<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags=Tag::orderBy('id','desc')->paginate(5);
        return view('tags.index',['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validatedData=$request->validate([
            'name'         => 'required|max:255',
        ]);
        $tag=new Tag;
        $tag->name= $validatedData['name'];
        $tag->save();

        session()->flash('message','New Tag was created successfully.');
        return redirect()-> route('tags.index');

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
        $tag=Tag::findOrFail($id);
        return view('tags.show',['tag'=>$tag]);
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
        $tag=Tag::findOrFail($id);
        return view('tags.edit',['tag'=>$tag]);
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
        $tag=Tag::findOrFail($id);
        $validatedData=$request->validate([
            'name'         => 'required|max:255',
        ]);
        $tag->name =$request->name;
        $tag->save();

        session()->flash('message','Tag was updated successfully.');
        return redirect()-> route('tags.show',$tag->id);


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
        $tag=Tag::findOrFail($id);
        $tag->posts()->detach();

        $tag->delete();
        session()->flash('message','Tag was deleted successfully.');
        return redirect()-> route('tags.index');

    }
}
