@extends('admin.layouts.admin')




@section('content')


    <h1 class="page-header">All Users</h1>

		@if(count($users))
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Photo</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Created</th>
		        <th>Udpdated</th>
		        <th>Role</th>
		        <th>Status</th>

		      </tr>
		    </thead>
		    <tbody>
		      @foreach( $users as $user)
		      <tr>
		        <td>{{$user->id}}</td>
		        <td><img height = "50" src=" {{$user->photo ? $user->photo->file : 'http://via.placeholder.com/50x50'}}" /></td>
		        <td><a href="{{route('users.edit', $user->id)}}"> {{$user->name}}</a></td>
		        <td>{{$user->email}}</td>
				<td>{{$user->created_at->diffForHumans()}}</td>
				<td>{{$user->updated_at->diffForHumans()}}</td>	
		        <td>{{$user->role->name}}</td>
		        <td>{{$user->status == 1 ? 'Active' : 'Not Active'}}</td>

		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	@else
	<p>There is no user in the list</p>	  
	@endif

@stop