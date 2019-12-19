<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::orderBy('id','desc')->paginate(5);

        //$this->authorize('viewAny');
        $user=new User;
       if (auth()->user()->isAdmin===$user->id){
            $this->authorize('viewAny',Category::class);
       }
        return view('categories.index',['categories'=>$categories]);
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
        $category=new Category;
        $category->name= $validatedData['name'];
        $category->user_id=auth()->user()->id;
        $category->save();

        session()->flash('message','New Category was created successfully.');
        return redirect()-> route('categories.index');


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
       $category=Category::findOrFail($id);
       if(auth()->user()->isAdmin){
            $this->authorize('view',$category);
   }
       return view('categories.show',['category'=>$category]);
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
        $category=Category::findOrFail($id);
        $user=new User;
        if(auth()->user()->isAdmin === $user->id){
            $this->authorize('update',$category);
       }
        return view('categories.edit',['category'=>$category]);
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
        $category=Category::findOrFail($id);
        $validatedData=$request->validate([
            'name'         => 'required|max:255',
        ]);
        $category->name =$request->name;
        $category->save();

        session()->flash('message','Category was updated successfully.');
        return redirect()-> route('categories.show',$category->id);

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
        $category=Category::findOrFail($id);
        $user=new User;
        if(auth()->user()->isAdmin === $user->id){
            $this->authorize('delete',$category);
       }
        $category->delete();
        session()->flash('message','Category was deleted successfully.');
        return redirect()-> route('categories.index');

    }
}
