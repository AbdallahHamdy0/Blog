@extends('admin.index')
@section('Contnet')

    <h1>Upload Image</h1>
    <hr>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6 card">
    <form class="mt-4 mb-4" method="POST" action="{{route('media.store')}} " enctype="multipart/form-data">
        
        @csrf

        <div class="input-group mb-3">
            <h5>Upload :</h5>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="photo" class="form-control" id="inputGroupFile02" >
            <label   class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>

          <button type="submit" class="btn btn-primary col-sm-4">Create</button>
    
    </form>  
</div>
</div>
@endsection