@extends('template.main')
@section('title','User List')
@section('content')
<div class="panel panel-default"> 
	<div class="panel-heading"> 
		<h3 class="panel-title">User List</h3> 
	</div> 
<div class="panel-body">
<a href="{{ route('users.create') }}" class="btn btn-info">Create User</a>
<div class="table-responsive">          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
      	<td>{{ $user->identification }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>
        	@if ($user->type=='admin')
        		<span class="label label-danger">{{ $user->type }}</span>
        	@else
        		<span class="label label-primary">{{ $user->type }}</span>
        	@endif
        </td>	
        <td>
            {{ Form::open(['route'=>'users.destroy', 'method'=>'POST', 'class'=>'form-control-sm']) }}
              {{  Form::hidden('id',$user->id,null) }}
              {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class'=>'btn btn-danger', 'type'=>'submit')) }}
            {{Form::close()}}
            {{ Form::open(['route'=>'users.edit', 'method'=>'POST', 'class'=>'form-control-sm'])}}
              {{ Form::hidden('id',$user->id,null) }}
              {{ Form::button('<span class="glyphicon glyphicon-pencil"></span>', array('class'=>'btn btn-warning', 'type'=>'submit')) }}
            {{ Form::close()}}          
          </td>
       </tr>	
     @endforeach      
    </tbody>
  </table>
  <center>{!!$users->render()!!}</center>
  </div>
</div> </div>
@endsection