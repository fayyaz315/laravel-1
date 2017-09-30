@extends('admin.layouts.admin')




@section('content')


    <h1 class="page-header">Create Post</h1>

    			{!! Form::open(['route' => 'posts.store','files' => true]) !!}
    			<div class="form-group"> 
    			{{ Form::label('title', 'Title:') }}
    			{{ Form::text('title',null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body',null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
    			{{ Form::label('category_id', 'Category:') }}
                {{ Form::select('category_id',['' => 'Choose option'] + $categories, null, array('class' => 'form-control'))}}
                </div>
              
				<div class="form-group"> 
                {{ Form::label('photo_id', 'Photo:') }}
                {{ Form::file('photo_id', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
                

                <div class="form-group">    
    			{{Form::submit('Add Post', array('class' => 'form-control btn btn-success btn-block', 'style' => 'margin:20px 0 20px 0'))}}
                </div>

				{!! Form::close() !!}

		
@stop