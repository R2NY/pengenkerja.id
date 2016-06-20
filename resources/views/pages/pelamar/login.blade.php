@extends('layouts.master')

@section('title', 'Login Pelamar')

@section('content')

	<div class="six wide column login">
		<h4 class="ui dividing header">Login Pelamar</h4>
		
		@include('common.errors')
		@include('common.success')

		<form class="ui form register" action="{{ url('pelamar/login') }}" method="POST">
			{{ csrf_field() }}
			<div class="field">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username">
			</div>

			<div class="field">
				<label>Password</label>
				<input type="password" name="password" placeholder="Password">	
			</div>
				
			<div class="field">
				<button class="ui right floated primary button login" type="submit">Login</button>
				<label>Belum Punya Akun?</label><a href="{{ url('pelamar/daftar') }}">Daftar Sekarang</a>
			</div>
			
		</form>
	</div>

@endsection