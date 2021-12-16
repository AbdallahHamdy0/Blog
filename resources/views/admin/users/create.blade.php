@extends('admin.index')
@section('Contnet')
<div class="row">
    <div class="col-sm-3"> </div>
    <div class="card rounded col-sm-6 ">
      <div class="card-body">
        <div class="card-title"><h3>Create User  </h3>  </div>
          <div class="card-body">
        
      
    <form method="POST" action="{{route('user.store')}} " enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
            
        <label for="exampleInputname" class="form-label">Name </label>
        <input name="name" type="name" class="form-control" id="exampleInputname" >
      </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>

      <div class="input-group mb-3">
        <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
        <label   class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>

      <div class="mb-3 row">
        <div class="col">
            <label for="exampleFormControlSelect1">Role</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="role_id">
                  @foreach ($roles as $role)
                  <option value="{{$role->id}}" >{{$role->name}}</option>
                  
                  @endforeach
                </select>     
               </div>
        <div class="col">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="is_active">
                <option value="1" >Active</option>
                <option value="0">Not Active</option>
            </select>     
           </div>        
        </div>

        
     
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
      </div>
     
      <button type="submit" class="btn btn-primary col-sm-4">Create</button>
    </form>
</div>
  </div>
  </div>
</div>
<div class="col-sm-3"></div>

  </div>
@include('errors.errorpage')

@endsection