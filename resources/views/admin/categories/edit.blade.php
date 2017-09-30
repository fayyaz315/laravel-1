@extends('admin.layouts.admin')




@section('content')


    <h1 class="page-header">Edit Categoy</h1>
               <div class="col-lg-6">

                <div class="col-lg-12">
    			{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'files' => true]) !!} 
    			<div class="form-group"> 
    			{{ Form::label('name', 'Title:') }}
    			{{ Form::text('name',null, array('class' => 'form-control'))}}
                </div>
            
                <div class="form-group"> 
                <div class="col-lg-6">   
    			     {{Form::submit('Update Cagtegory', array('class' => 'form-control btn btn-success btn-block', 'style' => 'margin:20px 0 20px 0'))}}
                     {!! Form::close() !!}
                </div>
                <div class="col-lg-6">
                    
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                        {{Form::submit('Delete', ['class' => 'form-control btn btn-danger btn-block', 'style' => 'margin:20px 0 20px 0'])}}
                    {!! Form::close() !!} 
                </div>
                </div>

				

                

                </div>

            </div>
            <div class="col-lg-6">

        @if(count($categories))
        <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Posts</th>
                <th>Created</th>
                <th>Updated</th>
                

              </tr>
            </thead>
            <tbody>
              @foreach( $categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit', $category->id)}}" >{{$category->name}}</a></td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>{{$category->updated_at->diffForHumans()}}</td> 
                

              </tr>
              @endforeach
            </tbody>
          </table>
    @else
    <p>There is no category in the list</p>   
    @endif
  </div>
		
@stop