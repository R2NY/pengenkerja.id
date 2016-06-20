@extends('layouts.master')

@section('title', 'Daftar Pelamar')

@section('content')

<div class="eight wide column login">
	<h4 class="ui dividing header">Pendaftaran Pengeners</h4>
	
	@include('common.errors')

	<form class="ui form" action="{{ url('pelamar/daftar') }}" method="POST">
		{{ csrf_field() }}
		<div class="field">
			<label>Data Diri</label>
			<div class="ui grid">
				<div class="column">
					<input type="text" name="nama" value="{{ old('nama') }}" placeholder="John Doe">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="ui grid">
				<div class="row">
					<div class="left floated wide column">
						<input type="radio" name="kelamin" value="L" checked> Laki-laki	&nbsp;&nbsp;
						<input type="radio" name="kelamin" value="P"> Perempuan
					</div>
				</div>
			</div>
		</div>
		<div class="field">
			<div class="ui two column grid">
				<div class="column">
					<div class="ui left icon input alamat">
						<i class="marker icon"></i>
						<input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat Anda">	
					</div>
				</div>
				<div class="column">
					<input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="No. Telepon">
				</div>
			</div>
		</div>
		<div class="field">
			<label>Data Akun</label>
			<div class="ui grid">
				<div class="column">
					<input type="email" name="email" value="{{ old('email') }}" placeholder="email">
				</div>
			</div>
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
			<label>Sudah punya akun?</label><a href="{{ url('pelamar/login') }}">Login</a>
		</div>
		
	</form>
</div>

@endsection