@extends('admin.index')




@section('Contnet')
<div class="row">
    <div class="card rounded col-sm-11 ">
      <div class="card-body">
        <div class="card-title"><h3>Create Post  </h3>  </div>
          <div class="card-body">
        
      
    <form method="POST" action="{{route('post.store')}} " enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
      <div class="mb-3">
            
        <label for="exampleInputname" class="form-label">Title </label>
        <input name="title" type="name" class="form-control" id="exampleInputname" >
      </div>
        <div class="mb-3">
        <label for="mytextarea" class="form-label">Body</label>
            <textarea name="body" id="mytextarea" class="form-control" cols="20" rows="5"></textarea>
      </div>

      <div class="input-group mb-3">
        <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
        <label   class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>

      <div class="mb-3 row">
        <div class="col">
            <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category_id">
                  @foreach ($cats as $cat)
                  <option value="{{$cat->id}}" >{{$cat->name}}</option>
                  
                  @endforeach
                </select>  
        </div>
                {{-- <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="role_id">
                  @foreach ($roles as $role)
                  <option value="{{$role->id}}" >{{$role->name}}</option>
                  
                  @endforeach
                </select>      --}}
               </div>
     
      <button type="submit" class="btn btn-primary col-sm-6">Create</button>
    </form>


  </div>
</div>
<div class="col-sm-1"></div>

  </div>
@include('errors.errorpage')

@endsection