@extends('admin.index')
@section('Contnet')
<div class="row">
    <div class="col-sm-1"> </div>
    <div class="card rounded col-sm-7 ">
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
        <label for="exampleInputBody" class="form-label">Body</label>
            <textarea name="body" id="exampleInputBody" class="form-control" cols="20" rows="5"></textarea>
      </div>

      <div class="input-group mb-3">
        <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
        <label   class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>

      <div class="mb-3 row">
        <div class="col">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category_id">
                <option value="0" >Newtwork</option>
                <option value="1" >Market</option>
                <option value="2" >Clothes</option>

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
<div class="col-sm-3"></div>

  </div>
@include('errors.errorpage')

@endsection