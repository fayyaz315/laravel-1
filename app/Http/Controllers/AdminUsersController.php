<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Role;
use App\Photo; 
use Session; 

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create',compact('roles')); 
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
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',    
        ]);


        $input = $request->all(); 


        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name); 
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id; 

        

           $input['password'] = bcrypt($request->password);

          User::create($input);
          Session::flash('success', 'User have been created successfully!');   
          return redirect()->route('users.index');
        }

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
        $user = User::find($id);
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit', compact('user', 'roles')); 


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
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',    
        ]);

         $user =User::find($id); 
          $input = $request->all(); 


        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name); 
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id; 

        

           
            }
          $input['password'] = bcrypt($request->password);  
          $user->update($input);  

          Session::flash('success', 'User have been updated successfully!'); 
          return redirect()->route('users.index');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id); 

        //unlink(public_path() . $user->photo->file);
       
        $user->delete();

        Session::flash('success', 'User have been deleted successfully!'); 
         return redirect()->route('users.index');
    }
}
