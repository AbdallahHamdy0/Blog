@extends('admin.index')
@section('style')
    <link rel="stylesheet" href="/css/post.css">
@endsection
@section('Contnet')

<h1>Posts</h1>
<hr>
<div class="row">
  @if (session()->has('delete_user'))
  <div class="bg-danger">{{session('delete_user')}} </div>
  @elseif(session()->has('message'))
    <div class="alert alert-success">{{session('message')}}</div>
  @endif
</div>

@foreach ($posts as $post)
    

<div class="row">
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15 bg-light"  src="{{$post->user->photo ? $post->user->photo->file :"No Pic"}}" alt="Image Description">
            <span class=" g-color-gray-dark-v1 mb-0 pt-3"><a href=""> {{$post->user->name}} </a></span>
        </div>
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0"><a href="{{route('post.edit',$post->id)}} ">{{$post->title}}</a>  </h5>
                  <span class="g-color-gray-dark-v4 g-font-size-12 ml-2 mb-0">{{$post->created_at->diffForHumans()}} </span> <span><a href=""><small><u>{{$post->category->name}}</u> </small></a></span>

                    <hr >
                
              </div>
        
              <p> {{$post->body}} </p>
              
              <img src="{{$post->photo->file}}" alt="" height="250px" width="500px">

              <ul class="mt-4 list-inline d-sm-flex my-0">
                <li class="list-inline-item g-mr-20">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                    <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                    178
                  </a>
                </li>
                <li class="list-inline-item g-mr-20">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                    <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                    34
                  </a>
                </li>
                <li class="list-inline-item ml-auto">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                    Reply
                  </a>
                </li>
              </ul>
            </div>
        </div>
    </div>
    
    @endforeach
    @endsection