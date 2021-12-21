@extends('admin.index')
@section('Contnet')
    
    @if (count($comments)>0)
    <h1>Comments</h1>
    <hr>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Body</th>
            <th scope="col">Post</th>
            <th scope="col">Replies</th>
            <th scope="col">Status</th>
            <th scope="col">Delete</th>
            
            
          </tr>
        </thead>
        <tbody>
          @foreach ($comments as $comment)
          <tr>
            <th scope="row">{{$comment->id}} </th>
            <td>{{$comment->author}} </td>
            <td>{{$comment->email}} </td>
            <td>{{$comment->body}} </td>
            <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a> </td>
            <td><a href="{{route('replies.show',$comment->id)}}">View Replies</a> </td>

            <td>
                @if ($comment->is_active == 1)
                <form method="POST" action="{{route('comments.update',$comment->id)}} ">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name='is_active' value="0">
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
                
                 @else
                 <form method="POST" action="{{route('comments.update',$comment->id)}} ">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name='is_active' value="1">
                    <button type="submit" class="btn btn-primary">disapprove</button>
                    </form>
                    
                @endif
                
            </td>
            <td>
                <form method="POST" action="{{route('comments.destroy',$comment->id)}} ">
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
      <h1 class="text-center">Oops . . . NoComments :( </h1>
        
    @endif
    
    
@endsection