@extends('admin.index')
@section('Contnet')

<h1> Edit :{{$user->name}}</h1>
<hr>

<div class="card">
  <div class="card-body">
<div class="row">
  <div class="col-sm-3  m-2" style="     border-right: 1px solid #ddd;  ">
    <img height="200px" width="190px" src="{{$user->photo ? $user->photo->file :"No Pic"}}"   alt="" class="img imf-resposive rounded">
  </div>
  <div class="col-sm-7">
<form method="POST" action="{{route('user.update',$user)}} " enctype="multipart/form-data" >
    @csrf
    @method('PUT')
  <div class="mb-3">
        
    <label for="exampleInputname" class="form-label">Name </label>
    <input name="name" type="name" class="form-control" id="exampleInputname"  value="{{ $user->name }}">
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}">

  </div>

  <div class="input-group mb-3">
    <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
    <label   class="input-group-text" for="inputGroupFile02">Upload</label>
  </div>

  <div class="mb-3 row">
    <div class="col">
        <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="role_id">
              @if ($user->role)
              <option value="{{$user->role->id}}"  slected>{{$user->role->name}}</option>

              @endif
              @foreach ($roles as $role)
              @if ($user->role->name != $role->name)
              <option value="{{$role->id}}" >{{$role->name}}</option>
              @endif
              @endforeach
            </select>     
           </div>
    <div class="col">
        <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="is_active">
            <option value="1" {{$user->is_active == 1 ?'selected':'' }} >Active</option>
            <option value="0" {{$user->is_active == 0 ?'selected':'' }}>Not Active</option>
        </select>     
       </div>        
    </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
<div class="row" style="justify-content: space-between;">
  <button type="submit"  class="btn btn-success col-sm-5 ">Update</button>
</form>

  <form method="POST" action="{{route('user.destroy',$user->id)}}" >
  @csrf
  @method('delete')
  <button type="submit" class="btn btn-danger col-sm-5 right" >Delete</button>
</form>
</div>
</div>
<div class="col-sm-2"></div>
</div>
</div>
</div>
>

</div>
@include('errors.errorpage')

@endsection
