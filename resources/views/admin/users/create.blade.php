@extends('admin.layouts.admin')




@section('content')


    <h1 class="page-header">Create User</h1>

    			{!! Form::open(['route' => 'users.store','files' => true]) !!}
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
                {{ Form::select('status',array(1 => 'Active', 0 => 'Not Active'), 0, array('class' => 'form-control'))}}
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
    			{{Form::submit('Add User', array('class' => 'form-control btn btn-success btn-block', 'style' => 'margin:20px 0 20px 0'))}}
                </div>

				{!! Form::close() !!}

		
@stop