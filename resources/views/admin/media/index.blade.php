@extends('admin.index')

@section('Contnet')

<h1>PHOTOS</h1>
 <hr>
        <div class="row">
            @if (session()->has('delete_user'))
            <div class="alert alert-danger">{{session('delete_user')}} </div>
            @elseif(session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        </div>
        @include('errors.errorpage')

        <div class="row"> 
            <div class="col-md-10">
                @if ($photos) 

                <form action="/delete/media" method="POST" class="form-inline">
                    @method('delete')
                    <select name="checkboxarray" class="form-control select">
                        <option value="delete">Delete</option>
                    </select>
                    <input type="submit" class=" btn btn-danger" value="Delete">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="options" class="checkboxes"> </th>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created_Date</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($photos as $photo)
                                
                        
                                <tr>
                                    <th scope="row"> <input class="checkBoxes" type="checkbox" name="checkboxarray[]" value="{{$photo->id}}"> </th>

                                    <th >{{$photo->id}}</th>
                                    <td><img height="80px" src="{{ $photo->file }}"   alt=""></td>
                                    <td>{{$photo->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form method="POST" action="{{route('media.destroy',$photo->id)}} ">
                                                @csrf
                                                @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button> 
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                @endif
            </div> 
        </div> 

        
    
@endsection
@section('script')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      
      $('#options').click(function(){
        
        if(this.checked){
            $('.checkBoxes').each(function(){

                this.checked=true;


            });
        }else{
            $('.checkBoxes').each(function(){

            this.checked=false;


        });
        }
        


      });
      
      
          });
</script>
    
@endsection

