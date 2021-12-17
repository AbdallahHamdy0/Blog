@extends('admin.index')
@section('Contnet')
<div class="row">
    <div class="col-md-1"></div>
<div class="card col-md-8">
    <div class="card-title mt-5"> <h5> Edit Category :{{$cat->name}} </h5></div>
        <hr>
        <div class="card-body">
            <form method="POST" action="{{route('category.update',$cat->id)}} " >
                @csrf
                @method('put')
              <div class="mb-3">
                    <label for="exampleInputname" class="form-label">Name </label>
                    <input name="name" type="name" class="form-control" id="exampleInputname" >
              </div>
              <button type="submit" class="btn btn-primary col-sm-6 ml-2 center">Update</button>
        </div>
    </form>
</div>
<div class="col-md-3"></div>

</div>




@endsection