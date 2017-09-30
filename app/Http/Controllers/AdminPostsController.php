<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\Role;
use App\Photo; 
use App\Category; 
use Session;
use Auth;  

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.create',compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'photo_id' => 'required'
            
        ]);


        $input = $request->all(); 

        $user = Auth::user(); 


        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name); 
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id; 

        }


          $user->posts()->create($input);
          Session::flash('success', 'Post have been created successfully!');   
          return redirect()->route('posts.index');
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
