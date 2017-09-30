@extends('admin.layouts.admin')




@section('content')


    <h1 class="page-header">Edit Post</h1>
                
                <div class="col-lg-3">
                    <img height = "360" class='img-responsive img-rounded' src=" {{$post->photo ? $post->photo->file : 'http://via.placeholder.com/400x400'}}" />

                </div> 
                <div class="col-lg-9">
    			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!} 
    			<div class="form-group"> 
    			{{ Form::label('title', 'Title:') }}
    			{{ Form::text('title',null, array('class' => 'form-control'))}}
                </div>
               <div class="form-group"> 
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body',null, array('class' => 'form-control'))}}
                </div>
    
                <div class="form-group"> 
    			{{ Form::label('category_id', 'Role:') }}
                {{ Form::select('category_id',['' => 'Choose option'] + $categories, null, array('class' => 'form-control'))}}
                </div>
				<div class="form-group"> 
                {{ Form::label('photo_id', 'Photo:') }}
                {{ Form::file('photo_id', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group"> 
                <div class="col-lg-6">   
    			     {{Form::submit('Update Post', array('class' => 'form-control btn btn-success btn-block', 'style' => 'margin:20px 0 20px 0'))}}
                     {!! Form::close() !!}
                </div>
                <div class="col-lg-6">
                    
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                        {{Form::submit('Delete', ['class' => 'form-control btn btn-danger btn-block', 'style' => 'margin:20px 0 20px 0'])}}
                    {!! Form::close() !!} 
                </div>
                </div>

				

                

                </div>
		
@stop