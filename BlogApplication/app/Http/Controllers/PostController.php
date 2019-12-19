<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use Image;
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

        if($request->hasFile('post_image')){
            $image= $request->file('post_image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $path=public_path('images/'.$filename);
            Image::make($image)->resize(300,300)->save($path);
            $post->post_image=$filename;
        }
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
        //Getting the post views 
        $blogKey = 'blog_' . $post->id;
        if (!Session::has($blogKey)) {
            $post->increment('page_view');
            Session::put($blogKey,1);
        }
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
 
        $post= Post::findOrFail($id);
        if(auth()->user()->isAdmin xor $post->user_id === auth()->user()){
             $this->authorize('update',$post);
        }
        
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
        $post->title= $request->input('title');
        $post->content=$request->input('content');
        $post->category_id=$request->input('category_id');
        //$tags=$request->input('tag',[]);
        $post->save();
        
       /*if(isset($request->tags)){
          $post->tags()->sync($request->tags,true);
        }
        else{
            $post->tags()->sync(array());
        }*/
        

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
        if(auth()->user()->isAdmin xor $post->user_id === auth()->user()){
            $this->authorize('delete',$post);
       }
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('message',"Post was deleted");
    }
}
