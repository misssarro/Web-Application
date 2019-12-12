<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       //$posts=Post::All();
        
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $tags=Tag::all();

        return view('posts.create',['categories'=>$categories,'tags'=>$tags]);
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
            'title'         => 'required|max:255',
            'content'       => 'required',
            'category_id'   =>'required|integer',
        ]);
        $post =new Post;
        $post->user_id = auth()->user()->id;
        $post->category_id= $validatedData['category_id'];
        $post->title= $validatedData['title'];
        $post->content= $validatedData['content'];
        $post->save();
        
        $post->tags()->sync($request->tags,false);

        session()->flash('message','Post was created successfully.');
        return redirect()-> route('posts.show',$post->id);

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
        
        $post= Post::findOrFail($id);
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database
        //retuen a view and pass the post id of the post that is already created
        $post= Post::findOrFail('$id');
        $categories=Category::all();
        $categories1=array();
        foreach($categories as $category){
            $categories1[$category->id]=$category->name;
        }
        $tags=Tag::all();
        $tags1=array();
        foreach($tags as $tag){
            $tags1=[$tag->id]=$tag->name;
        }
        return view('posts.edit',['post'=>$post,'categories'=>$categories1,'tags'=>$tags1]);
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
        //validate the data, save it to the database and display sucess message then redirect the user to post(posts.show)
        $validatedData=$request->validate([
            'title' => 'required|max:255',
            'content'=> 'required',
            'category_id'=> 'required|integer',
        ]);
        $post=Post::findOrFail($id);
        $post->title= $request->get('title');
        $post->content=$request->get('content');
        $post->category_id=$request->get('category_id');

        $post->save();
        
        if(isset($request->tags)){
          $post->tags()->sync($request->tags,true);
        }
        else{
            $post->tags()->sync(array());
        }
        

        session()->flash('message','Post was updated successfully.');
        return redirect()-> route('posts.show',$post->id);
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
        $post=Post::findOrfail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('message',"Post was deleted");
    }
}
