@extends('layouts.master')

@section('title', 'Daftar Penyedia')

@section('content')

	<div class="eight wide column login">
		<h4 class="ui dividing header">Pendaftaran Penyedia</h4>

		@include('common.errors')
		
		<form class="ui form" action="{{ url('penyedia/daftar') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="field">
				<div class="ui grid">
					<div class="column">
						<input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Perusahaan">			
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui grid">
					<div class="column">
						<input type="file" name="logo" value="{{ old('logo') }}" placeholder="Logo">			
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui grid">
					<div class="column">
						<input type="email" name="email" value="{{ old('email') }}" placeholder="Email">			
					</div>
				</div>
			</div>
			<div class="field"> 
				<div class="ui grid">
					<div class="column">
						<input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui grid">
					<div class="column">
						<select class="ui dropdown" name="id_kategori">
							<option value="">Kategori</option>
							@foreach($kategori as $k) 
								<option value="{{ $k->id }}">{{ $k->nama }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui grid">
					<div class="column">
						<input type="text" name="website" value="{{ old('website') }}" placeholder="Website">			
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui grid">
					<div class="column">
						<input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="No Telepon">			
					</div>
				</div>
			</div>
			<div class="field">
				<label>Data Akun</label>
				<div class="ui two column grid">
					<div class="column">
						<input type="text" name="username" value="{{ old('username') }}" placeholder="Username">			
					</div>
					<div class="column">
						<input type="password" name="password" placeholder="Password">			
					</div>
				</div>
			</div>
    		<div class="field">
				<button class="ui right floated primary button login">Daftar</button>
				<label>Sudah punya akun?</label><a href="{{ url('penyedia/login') }}">Login Sekarang</a>
			</div>
			
		</form>
	</div>


@endsection