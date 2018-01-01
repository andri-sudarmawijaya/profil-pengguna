@extends('layouts.admin')

@section('title',$title)

@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Profil</li>
		</ol>
	</nav>
	<div class="row">    	
		<div class="col-md-12">        	
			
			<div class="card">					
				<div class="card-header">
					<i class="fa fa-user"></i> Profil pengguna
					<span class="pull-right">						
						<a href="{{ route('profil.edit-account') }}" class="bnt btn-sm btn-success"><i class="fa fa-pencil"></i> Edit account</a>
						<a href="{{ route('profil.change-password') }}" class="bnt btn-sm btn-primary"><i class="fa fa-key"></i> Change password</a>
					</span>	
				</div>
				<div class="card-body">
					<table>
						<tr>
							<th>NIK</th>
							<td width="15px">:</td>
							<td>{{ Auth::user()->nik }}</td>
						</tr>
						<tr>
							<th>Full Name</th>
							<td>:</td>
							<td>{{ Auth::user()->name }}</td>
						</tr>						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@stop