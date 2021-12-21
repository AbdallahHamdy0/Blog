@extends('layouts.app')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @foreach ($posts as $post)
                
            

            <!-- First Blog Post -->
            <h2>
                <a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="">{{$post->user->name}} </a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> from : {{$post->created_at->diffForHumans()}}   <b> category :</b> <small><a>{{$post->category->name}}</a></small> </p>
            <hr>
            <img class="img-responsive" height="300" width="750" src="{{$post->photo ? $post->photo->file:"http://placehold.it/900x300" }}" alt="">
            <hr>
            <p>{{$post->body}} </p>
            <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            @endforeach
            
           

        </div>
        

        <!-- Blog Sidebar Widgets Column -->
      

    </div>
    <div class="row mt-4">
        <div class="col-sm-6">
          <div class="col offset-6">
            {{$posts->render()}}
          </div>
        </div>
      </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-md-12 text-center" >
                <p>Copyright &copy; Your Website 2021</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
@endsection
