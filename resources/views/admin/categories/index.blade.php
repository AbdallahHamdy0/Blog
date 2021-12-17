@extends('admin.index')
@section('Contnet')

<h1>Categories</h1>
 <hr>
 @include('errors.errorpage')

<div class="row">
    
    <div class="col-md-6">
        <form method="POST" action="{{route('category.store')}} " >
            @csrf
          <div class="mb-3">
                <label for="exampleInputname" class="form-label">Name </label>
                <input name="name" type="name" class="form-control" id="exampleInputname" >
          </div>
          <button type="submit" class="btn btn-primary col-sm-6 ml-2">Create</button>

        </form>
        
    </div>
    
    <div class="col-md-6">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created_Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cats as $cat)
                    
               
                    <tr>
                        <th scope="row">{{$cat->id}}</th>
                        <td><a href="{{route('category.edit',$cat->id)}} "> {{$cat->name}}</a> </td>
                        <td>{{$cat->created_at->diffForHumans()}}</td>
                        <td>
                            <form method="POST" action="{{route('category.destroy',$cat->id)}} ">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div> 
</div> 
    
@endsection