@extends('admin.layouts.admin')




@section('content')


    <h1>Edit User</h1>
                
                <div class="col-lg-3">
                    <img height = "360" class='img-responsive img-rounded' src=" {{$user->photo ? $user->photo->file : 'http://via.placeholder.com/400x400'}}" />

                </div> 
                <div class="col-lg-9">
    			{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!} 
    			<div class="form-group"> 
    			{{ Form::label('name', 'Name:') }}
    			{{ Form::text('name',null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email',null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
    			{{ Form::label('role_id', 'Role:') }}
                {{ Form::select('role_id',['' => 'Choose option'] + $roles, null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
    			{{ Form::label('status', 'Status:') }}
                {{ Form::select('status',array(1 => 'Active', 0 => 'Not Active'), null, array('class' => 'form-control'))}}
                </div>
				<div class="form-group"> 
                {{ Form::label('photo_id', 'Photo:') }}
                {{ Form::file('photo_id', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
                </div>

                <div class="form-group"> 
                <div class="col-lg-6">   
    			     {{Form::submit('Update User', array('class' => 'form-control btn btn-success btn-block', 'style' => 'margin:20px 0 20px 0'))}}
                     {!! Form::close() !!}
                </div>
                <div class="col-lg-6">
                    
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                        {{Form::submit('Delete', ['class' => 'form-control btn btn-danger btn-block', 'style' => 'margin:20px 0 20px 0'])}}
                    {!! Form::close() !!} 
                </div>
                </div>

				

                

                </div>
		
@stop