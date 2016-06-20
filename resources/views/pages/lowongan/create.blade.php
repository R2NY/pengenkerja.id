@extends('layouts.master')

@section('title', 'Tambah Lowongan')

@section('content')

<div class="ten wide column login">
	<h4 class="ui dividing header">Tambah Lowongan</h4>

	@include('common.errors')
	@include('common.success')

	<form class="ui form register" action="{{ url('lowongan/tambah') }}" method="POST">
		{{ csrf_field() }}
		<div class="field">
			<label>Posisi</label>
			<input type="text" name="posisi" value="{{ old('posisi') }}" placeholder="Posisi">
		</div>

		<div class="field">
			<label>Gaji</label>
			<div class="ui left icon input alamat">
				<i class="dollar icon"></i>
				<input type="text" name="gaji" value="{{ old('gaji') }}" placeholder="Gaji">	
			</div>
		</div>
		<div class="field">
			<label>Persyaratan</label>
			<textarea name="persyaratan">{{ old('persyaratan') }}</textarea>	
		</div>
		<div class="field">
			<label>Deskripsi Pekerjaan</label>
			<textarea name="deskripsi">{{ old('deskripsi') }}</textarea>	
		</div>
		<div class="field">
			<label>Tanggal Mulai</label>
			<input type="date" name="tgl_mulai" value="{{ old('tgl_mulai') }}" placeholder="Tgl Mulai">	
		</div>
		<div class="field">
			<label>Tanggal Selesai</label>
			<input type="date" name="tgl_selesai" value="{{ old('tgl_selesai') }}" placeholder="Tgl Selesai">	
		</div>	
		<div class="field">
			<button class="ui right floated primary button login" type="submit">Tambah</button>
		</div>
		
	</form>
</div>

@endsection 