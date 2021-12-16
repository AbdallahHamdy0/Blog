@extends('admin.index')
@section('Contnet')
      <h1>Admin Panel </h1>
  <hr>
  <div class="row">
    @if (session()->has('delete_user'))
    <div class="bg-danger">{{session('delete_user')}} </div>
    @elseif(session()->has('message'))
      <div class="alert alert-success">{{session('message')}}</div>
    @endif
  </div>
            <div class="card">
              <div class="card-body">
                <div class="card-title">Users Data</div>
                <hr>
                <div class="card-text">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Role</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created_at</th>
                      <th scope="col">Update_at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">{{$user->id}} </th>
                      <td> <a href="{{route('user.edit',$user->id)}} ">{{$user->name}} </a> </td>
                        <td><img height="80px" src="{{$user->photo ? $user->photo->file :"No Pic"}}"   alt=""></td>
                      <td>{{$user->role->name}}</td>
                      <td>{{$user->is_active == 1 ?"Active":"Not Active" }}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
              </div>
            </div> 
@endsection