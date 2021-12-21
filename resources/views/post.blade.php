@extends('layouts.blog-post')
@section('content')
<h1>{{$post->title}}</h1> 
@if (Session::has('message'))
<div class="alert alert-success">{{session('message')}}</div>
    
@endif
<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted from {{ $post->created_at->diffForHumans()}}  <small><a>{{$post->category->name}}</a></small></p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">
    <p>{{$post->body}}</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
</p>
<hr>

<!-- Blog Comments -->
@if (Auth::check())
    
  

<!-- Comments Form -->
<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://code-hacking.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//code-hacking.disqus.com/count.js" async></script>


@endif








@endsection

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
    
@endsection



{{-- Comment Working Here  --}}
{{-- <div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form"  method="POST" action="{{route('comments.store')}}">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}} ">
        <div class="form-group">
            <textarea name="body" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>
@endif
<!-- Posted Comments -->



<!-- Comment -->
@if (count($comments)>0)
    @foreach ($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img class= "rounded media-object " width="65px"height="65"  src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                {{$comment->body}}
    
            @if (count($comment->replies)>0)
                @foreach ($comment->replies as $reply)
                <!-- Nested Comment -->
                    <div id="nested-comment" class=" media " style="margin-top: 50px">
                        <a class="pull-left" href="#">
                            <img class=" media-object"width="65px"height="65" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>
                        <div class="comment-reply-container ">
                            <button class="toggle-reply btn btn-primary pull-right">reply</button>
                            <div class="comment-reply col-md-10 ">
                                <form role="form"  method="POST" action="{{route('replies.store')}}">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{$comment->id}} ">
            
                                    <div class="form-group ">
                                        <textarea name="body" class="form-control " rows="1" style="color: #aaa;margin-top:5px "> Replay . . .</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                <!-- End Nested Comment -->
                    </div>
                @endforeach
           
            @elseif(count($comment->replies)==0)
            
            <div id="nested-comment" class=" media " style="margin-top: 50px">
                <div class="comment-reply-container ">
                    <button class="toggle-reply btn btn-primary pull-right">reply</button>
                    <div class="comment-reply col-md-10 ">
                        <form role="form"  method="POST" action="{{route('replies.store')}}">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment->id}} ">
    
                            <div class="form-group ">
                                <textarea name="body" class="form-control " rows="1" style="color: #aaa;margin-top:5px "> Replay . . .</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Nested Comment -->
            </div>
    
            @endif 
        </div>
    
        </div>


    @endforeach
<hr>       --}}



{{-- Stop --}}


{{-- <div id="nested-comment" class=" media " style="margin-top: 50px"> 
    <div class="comment-reply-container ">
        <button class="toggle-reply btn btn-primary pull-right">reply</button>

        <div class="comment-reply col-md-10 ">
            <form role="form"  method="POST" action="{{route('replies.store')}}">
                @csrf
                <input type="hidden" name="comment_id" value="{{$comment->id}} ">

                <div class="form-group ">
                    <textarea name="body" class="form-control " rows="1" style="color: #aaa;margin-top:5px "> Replay . . .</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div> --}}