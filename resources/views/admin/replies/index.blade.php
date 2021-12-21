@extends('admin.index')
@section('Contnet')
    
    @if (count($replies)>0)
    <h1>replies</h1>
    <hr>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Body</th>
            <th scope="col">Post</th>
            <th scope="col">Status</th>
            <th scope="col">Delete</th>
            
            
          </tr>
        </thead>
        <tbody>
          @foreach ($replies as $reply)
          <tr>
            <th scope="row">{{$reply->id}} </th>
            <td>{{$reply->author}} </td>
            <td>{{$reply->email}} </td>
            <td>{{$reply->body}} </td>
            <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a> </td>
            <td>
                @if ($reply->is_active == 1)
                <form method="POST" action="{{route('replies.update',$reply->id)}} ">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name='is_active' value="0">
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
                
                 @else
                 <form method="POST" action="{{route('replies.update',$reply->id)}} ">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name='is_active' value="1">
                    <button type="submit" class="btn btn-primary">disapprove</button>
                    </form>
                    
                @endif
                
            </td>
            <td>
                <form method="POST" action="{{route('replies.destroy',$reply->id)}} ">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form> 
            </td>

        </tr>
          @endforeach
          </tbody>
      </table>
      @else
      <h1 class="text-center">Oops . . . No replies :( </h1>
        
    @endif
    
    
@endsection