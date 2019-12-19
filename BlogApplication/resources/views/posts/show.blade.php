@extends('layouts.app')

@section('title',"| $post->title")


@section('content')
<br>
<div class="row">
    <div class="col-md-8">

        <h1>{{ $post->title }}</h1>
        <small> Posted by:{{ $post->user->name}}</small>
         <p>Posted in: {{$post->category->name}}</p>
         @if($post->post_image !=null)
             <img src="{{asset('images/'.$post->post_image)}}"height="300" width="300" />
        @endif
        <div class="tags">
             @foreach($post->tags as $tag)
                <span class="label label-info"># {{ $tag->name }}</span>
             @endforeach
    <p class="lead">{{$post->content }}</p>
    <hr>
    <h5>Comments<small> {{$post->comments()->count()}} total </small></h5>
   <!-- <div style="margin-bottom:50px">
        <textarea class="form-control" row="3" name="comment_content" placeholder="Add a comment here" v-model="commentBlock"></textarea>
        <button class="btn btn-success" style="margin-top:10px">Add Comment</button>
    </div>-->
    <div class="comments">
        <ul class="list-group">
           @foreach($post->comments as $comment)
           <hr>
            <li class="list-group-item">
                <p>by {{ $comment->user->name }} {{ date( 'M j, Y h:ia',strtotime($comment->created_at)) }} &nbsp;</strong></p>
                {{ $comment-> comment_content}}
        <div class="row">
            <div class="col-sm-10 ">
                <form method="GET" action="{{ route('comments.edit' ,$comment->id) }}">
                    @csrf
                    @can('update',$comment)
                             <input type="submit" value="Edit" class="btn btn-primary float-right mt-2">
                    @endcan
                </form>
            </div>
            <form method="POST" action="{{route('comments.destroy',['id' =>$comment->id]) }}">
                    @csrf
                    @method('DELETE')
                    @can('delete',$comment)
                        <input type="submit" value="Delete" class="btn btn-danger float-right mt-2 "> 
                    @endcan
            </form>
            </div>
            </li>
        @endforeach
        </ul>
    </div>

    <!--<div class="media" v-for="comment in comments">
        <div class="media-body">
           <h5 class="media-heading">by @{{comment.user.name}}</h5>
           <p>@{{comment.comment_content}}</p>
           <span>on @{{comment.created_at}}</span>
        </div>
    </div>-->
    <br/>
    <div class="row">
            <div class="col-md-8">
                 <form method="POST" action="{{ route('comments.store',$post->id) }}">
                @csrf
               <div class="form-group">
                <textarea id="comment_content " rows="5"  placeholder="Your comment here" name="comment_content"  class="form-control" value="{{ old('comment_content') }}"></textarea>
                </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                 </div>

               <!-- <div class="form-group">
                     <label name="name" >Name: </label>
                     <input id="name" name="name" class="form-control" value="{{ old('name') }}">
                 </div>-->
                
              <!-- <div style="margin-bottom:50px;" v-if="user">
                <textarea id="comment_content" rows="3" placeholder="Your comment here" name="comment_content"  class="form-control" v-model="commentBlock"></textarea>
                <button class= "btn btn-primary" style="margin-top:10px" @click.prevent="postComment">Add Comment</button>
                </div>-->
                <!--<div v-else>
                    <h5>Login to add your comment</h5><button class="btn btn-primary" href="{{ route('login') }}">Login</a>
                </div>-->
    
            </form>
            </div>
        </div>
        </div>
</div>
<div class="col-md-4">
    <div class="well">
    <dl class="dl-horizontal">
            <dt>View: {{ $post->page_view }}  </dt>
        </dl>
        <dl class="dl-horizontal">
            <dt>Create at: {{ date('M j, Y h:ia',strtotime($post->created_at)) }} </dt>
        </dl>
        <dl class="dl-horizontal">
            <dt>Category: {{ $post->category->name }} </dt>
        </dl>
        <dl class="dl-horizontal">
            <dt>Last updated at: {{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dt>
        </dl>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form method="GET" action="{{ route('posts.edit' ,$post->id) }}">
                    @csrf
                    @can('update',$post)
                        <input type="submit" value="Edit" class="btn btn-primary btn-block">
                    @endcan
                </form>  
            </div>
            <div class="col-sm-6">
            <form method="POST" action="{{route('posts.destroy',['id' =>$post->id]) }}">
                    @csrf
                    @method('DELETE')
                    @can('delete',$post)
                          <input type="submit" value="Delete" class="btn btn-danger btn-block">
                    @endcan
            </form>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <br>
                    <a  href="{{route('posts.index') }}" class=" btn btn-primary  btn-d-block">Show all blog posts</a>
                </div>
            </div>
    </div>
</div>
</div>
@endsection
<!--@section('scripts')
<script>
   const app=new Vue({
       el:'#app',
       data: {
           comments: {},
           commentBlock:'',
           post:{!! $post->toJson()!!},
           user:{!! Auth::check() ? Auth::user()->toJson():'null' !!}
       },
       mounted(){
           this.getComments();
       }, 
       methods:{
           getComments(){
               axios.get('api/posts/'+this.post.id+'/comments')
                    .then((response)=>{
                        this.comments=response.data
                    })
                    .catch(function(error)){
                        console.log(error);
                    }
                });
           },
           postComment(){
               axios.post('api/posts/'+this.post.id+'/comment',{
                   api_token: this.user.api_token,
                   comment_content:this:commentBlock
               })
               .then((response)=>{
                   this.comments.unshift(response.data);
                   this.commentBlock='';

               })
               .catch(function(error){
                   console.log(error);
               });
           }
       }
   });
</script>
@endsection-->