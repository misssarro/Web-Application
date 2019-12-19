<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        //
       // return response()->json($post->comments()->with('user')->latest()->get());
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
    public function store(Request $request,$post_id)
    {
        //
        $validatedData=$request->validate([
            'comment_content' => 'required|max:255',
        ]);
        $post=Post::findOrFail($post_id);
        $comment=new Comment;
        $comment->post_id=$request['post_id'];
        $comment->user_id=auth()->user()->id;
        $comment->comment_content=$request['comment_content'];
        $comment->save();

        session()->flash('message','Comment was added.');
        
        return redirect()-> route('posts.show',$post->id);

      /* $comment=$post->comments()->create([
            'comment_content'=>$request->comment_content,
            'user_id'=> auth()->user()->id,
            'post_id'=>$post->id
        ]);
        $comment=Comment::where('id',$comment->id)->with('user')->first();

        return $comment->toJason();*/
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
        $comment=Comment::findOrFail($id); 
        if(auth()->user()->isAdmin xor $comment->user_id === auth()->user()){
            $this->authorize('update',$comment);
       }
        return view('comments.edit',['comment'=>$comment]);
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
        $comment=Comment::findOrFail($id); 
        $validatedData=$request->validate([
            'comment_content'         => 'required|max:255',
        ]);
        $comment->comment_content=$request->input('comment_content');
        $comment->save();
        
        session()->flash('message','Comment was updated successfully.');
        return redirect()-> route('posts.show',$comment->post->id);

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
        $comment=Comment::findOrFail($id);  
        if(auth()->user()->isAdmin xor $comment->user_id === auth()->user()){
            $this->authorize('delete',$comment);
       }
        $post_id=  $comment->post->id;  
        $comment->delete();  
        session()->flash('message','Comment was deleted successfully.');
        return redirect()-> route('posts.show',$post_id);

    }
}
