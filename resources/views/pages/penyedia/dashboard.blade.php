@extends('layouts.master')

@section('logout-link', url('penyedia/logout'))

@section('title', 'Dashboard Penyedia')

@section('content')

	<div class="ui grid">
		<div class="column">
			<div class="pointing secondary buttons user">
				<div class="ui button active">Dashboard</div>
				<div class="ui button">Setting</div>
				<div class="ui right floated button green"><a href="{{ url('lowongan/tambah') }}">Tambah Lowongan</a></div>
			</div>
		</div>
	</div>
	<hr color="#e8e3dd" style="margin-top: 16px;">
	<div class="ui grid">
		<div class="ten wide column" style="border: 0.2em solid #e8e3dd; margin-top:5px;">
		<div class="header" style="margin-top:20px; font-size:20px;"><i class="normal announcement icon"></i><b>Sejarah Lowongan</b></div>
			<div class="column">
			
				@if(!empty($penyedia->lowongan))
					@foreach($penyedia->lowongan as $lowongan)
						<hr color="#e8e3dd" style="margin-top: 16px;">
						<div class="ui grid">
							<div class="column">
								<div class="ui segment">
									<img class="ui big rounded top aligned tiny left floated image" src="{{ asset('uploads/'.$penyedia->logo) }}">
						     		<div class="header"><b>{{ $lowongan->posisi }}</b></div>
						     		<p>{{ $lowongan->deskripsi }}</p>
						     		<button class="ui primary button" onclick="$('#modal').modal('show');">Lihat Pendaftar</button>
							    </div>
							</div>
						</div>
					@endforeach
				@else
					<div class="ui label">Anda belum pernah membuat lowongan pekerjaan.</div>
				@endif
				
			</div>
		</div>
		<div class="six wide column" style="border: 0.2em solid #e8e3dd; margin-top:5px;">
			<div class="column">
				<div class="header" style="margin-top:20px; font-size:20px;"><i class="normal book icon"></i><b>Profile</b></div>
				<hr color="#e8e3dd" style="margin-top: 16px;">
				<input type="file" name="foto" id="image" style="position: absolute; visibility: hidden;">
				<div class="image">
					<img src="{{ asset('uploads/'.$penyedia->logo) }}" onclick="$('#image').click()" style="background-color: #a9a6a6; width: 150px; border: 1px solid #e8e3dd; ">
				</div>
				
				<label  style="font-size:15px"><b>{{ $penyedia->nama }}</b></label><br>
				<i class="marker icon"></i><label>{{ $penyedia->alamat }}</label><br><br>
				<label><b>Ketegori:</b></label><br>
				<span>{{ $penyedia->kategori->nama }}</span><br><br>
				<label><b>Website:</b></label><br>
				<span>{{ $penyedia->website }}</span><br><br>
				<label><b>No. Telepon:</b></label><br>
				<span>{{ $penyedia->telepon }}</span><br><br>
				<label><b>Email:</b></label><br>
				<span>{{ $penyedia->email }}</span>
			</div>
		</div>
	</div>

@endsection
