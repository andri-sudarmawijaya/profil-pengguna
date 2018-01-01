@extends('layouts.admin')

@section('title',$title)

@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item" aria-current="page"><a href="{{ route('profil.index') }}">Profil</a></li>
			<li class="breadcrumb-item active" aria-current="page">Change password</li>
		</ol>
	</nav>
	<div class="row">		
		<div class="col-md-12">			
			<div class="card">					
				<div class="card-header">
					Change password
					<div>
						@if ($errors->any())

						@foreach ($errors->all() as $error)
						<div class="alert alert-danger">{{ $error }}</div>
						@endforeach					        

						@endif
						@if(session()->has('message'))
						<div class="alert alert-success">					        
							{{ session()->get('message') }}
						</div>
						@endif
					</div> 
				</div>
				<div class="card-body">
					{!! Form::open(['route' => 'profil.update-password','method' => 'POST']) !!}
					<div class="form-group">
						<label for="">Old password</label>
						<input value="{{ old('old_password') }}" type="password" name="old_password" class="form-control form-control-sm" placeholder="Old password">
					</div>
					<div class="form-group">
						<label for="">New Password</label>
						<input value="{{ old('password') }}" type="password" name="password" class="form-control form-control-sm" placeholder="New Password">
					</div>	
					<div class="form-group">
						<label for="">Confirm New Password</label>
						<input value="{{ old('confirm_password') }}" type="password" name="confirm_password" class="form-control form-control-sm" placeholder="Confirm new password">
					</div>					
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
</div>	
@stop