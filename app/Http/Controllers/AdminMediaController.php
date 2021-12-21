<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
class AdminMediaController extends Controller
{
    public function index()
    {
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    

   

    public function store(Request $request)
    {
        
        $file = $request -> file('photo');

            $name= time() . $file->getClientOriginalName();
            $file->move('images',$name);
            
            Photo::create((['file'=>$name]));
            session()->flash('message','New Photo Uploaded Successfully');


        return redirect('/admin/media/');

    }


    public function destroy($id)
    {
       $photo=Photo::findOrFail($id);

       session()->flash('delete_user','Photo '.$photo->file.' Was Deleted');
       unlink(public_path().$photo->file);
        $photo->delete();
        return redirect('/admin/media/');
    }

        public function deletemedia(Request $request)
        {
          $photos= Photo::findOrFail($request->checkboxarray);
          foreach($photos as $photo)
          {
              $photo->delete();
          }

          return redirect()->back();
        }
}
