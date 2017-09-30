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
        $post = Post::find($id);
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit', compact('post', 'categories')); 
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
            
            
        ]);

         $post =Post::find($id); 
          $input = $request->all(); 


        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name); 
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id; 

        

           
            }
          
          $post->update($input);  

          Session::flash('success', 'Post have been updated successfully!'); 
          return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id); 

        //unlink(public_path() . $post->photo->file);
       
        $post->delete();

        Session::flash('success', 'Post have been deleted successfully!'); 
         return redirect()->route('posts.index');
    }
}
