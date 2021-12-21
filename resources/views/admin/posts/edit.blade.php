@extends('admin.index')
@section('Contnet')

<h1> Edit :{{ $post->title}}</h1>
<hr>

<div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-sm-3  m-2" style="     border-right: 1px solid #ddd;  ">
            <img height="200px" width="190px" src="{{$post->photo ? $post->photo->file :"No Pic"}}"   alt="" class="img imf-resposive rounded">
        </div>
    <div class="col-sm-7">
    <form method="POST" action="{{route('post.update',$post)}} " enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-3">
                
            <label for="exampleInputname" class="form-label">Title </label>
            <input name="title" type="text" class="form-control" id="exampleInputname"  value="{!! old( 'tilte',$post->title) !!}">
        </div>

        <div class="mb-3">
            <label for="exampleInputBody" class="form-label">Body</label>
            <textarea name="body" id="" cols="75" rows="10">{!! old( 'body',$post->body) !!}</textarea>
        </div>

        <div class="input-group mb-3">
            <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
            <label   class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category_id">
                    @if ($post->category)
                    <option value="{{$post->category->id}}"  slected>{{$post->category->name}}</option>

                    @endif
                    @foreach ($cats as $cat)
                    @if ($post->category->name != $cat->name)
                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
                    @endif
                    @endforeach
                </select>
                </div>   
        </div>
            <div class=" row" style="    flex-wrap: nowrap;">
                <button type="submit"  class="btn btn-success col-sm-6 ">Update</button>
                </form>

                <form method="POST" action="{{route('post.destroy',$post->id)}}" >
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger col-sm-6 " >Delete</button>
                </form>
            </div>

    </div>
    
        <div class="col-sm-2"></div>
    </div>
</div>
</div>



@include('errors.errorpage')

@endsection
