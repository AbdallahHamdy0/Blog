<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
          $inputs=$request->all();
        if($file = $request->file('photo_id')){

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create((['file'=>$name]));
            $inputs['photo_id']=$photo->id;
        }

        $ost=Post::create($inputs);
        session()->flash('message','New Post Has Been Created : ');



         return redirect('/admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        $inputs=$request->all();

        if($file = $request->file('photo_id')){

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create((['file'=>$name]));
            $inputs['photo_id']=$photo->id;
        }
        $post->update($inputs);
        session()->flash('message',' Post Has Been Updated : '.$post->title);

        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post=Post::findOrFail($id);
        
        session()->flash('message',' Post Has Been Deleted : '.$post->title);

        $post->delete();

        return redirect('/admin/post');
    }
}
