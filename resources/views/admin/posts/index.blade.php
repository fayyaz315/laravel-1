@extends('admin.layouts.admin')




@section('content')


    <h1>All Posts</h1>

        @if(count($posts))
        <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
                

              </tr>
            </thead>
            <tbody>
              @foreach( $posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td><img height = "50" src=" {{$post->photo ? $post->photo->file : 'http://via.placeholder.com/50x50'}}" /></td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td> 
                

              </tr>
              @endforeach
            </tbody>
          </table>
    @else
    <p>There is no post in the list</p>   
    @endif

@stop