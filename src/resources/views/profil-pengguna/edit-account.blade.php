@extends('layouts.admin')

@section('title',$title)

@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item" aria-current="page"><a href="{{ route('profil.index') }}">Profil</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit account</li>
		</ol>
	</nav>
	<div class="row">		
		<div class="col-md-12">			
			<div class="card">					
				<div class="card-header">
					Edit account
					<span class="pull-right">
						<a href="{{ route('profil.change-password') }}" class="bnt btn-sm btn-primary"><i class="fa fa-key"></i> Change password</a>
					</span>	
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
					{!! Form::open(['route' => 'profil.update','method' => 'POST']) !!}
					<div class="form-group">
						<label for="">NIK</label>
						<input value="{{ $user->nik }}" type="text" name="nik" class="form-control form-control-sm" placeholder="NIK">
						<span class="help-block">
			                <strong>NIK digunakan sebagai username untuk login.</strong>
			            </span>
					</div>
					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input value="{{ $user->name }}" type="text" name="name" class="form-control form-control-sm" placeholder="Nama Lengkap">
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