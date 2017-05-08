@extends('template.main')
@section('title','User Creation')
@section('content')
@if(count($errors)>0)
	<div class="alert alert-danger">
		<ul>
	    @foreach($errors->all() as $error)
	    	<li>{{ $error }}</li>			
	    @endforeach
	    </ul>
	</div>
@endif
<div class="panel panel-default"> 
	<div class="panel-heading"> 
		<h3 class="panel-title">User Creation</h3> 
	</div> 
	<div class="panel-body">
		{!! Form::open(['route'=>'users.store', 'method'=>'POST'])!!}

		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Complete User Name']) !!}
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				{!! Form::label('identification','Id Number') !!}
				{!! Form::number('identification',null,['class'=>'form-control','required','placeholder'=>' User Identification']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('email','Email') !!}
				{!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'example@domain.com']) !!}
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-6">
				{!! Form::label('phone','Phone') !!}
				{!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>'997 358 2014']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('type','Type') !!}
				{!! Form::select('type',[''=>'Select a role...','member'=>'Member', 'admin'=>'Administrator'],null,['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				{!! Form::label('password','Password') !!}
				{!! Form::password('password',['class'=>'form-control','required','placeholder'=>'**********']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('retry_password','Retype Password') !!}
				{!! Form::password('retry_password',['class'=>'form-control','required','placeholder'=>'**********']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Register',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close()!!}
	</div> 
</div>
@endsection