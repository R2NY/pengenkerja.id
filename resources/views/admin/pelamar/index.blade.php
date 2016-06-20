@extends('layouts.master-admin')

@section('content-title', 'Pelamar')

@section('content')

<table class="ui celled striped table">
  <thead>
    <tr>
    	<th colspan="7">Daftar Pelamar</th>
  	</tr>
  	<tr>
    	<th width="40">#</th>
    	<th>Nama</th>
    	<th>Email</th>
    	<th>Alamat</th>
    	<th>Kemampuan</th>
    	<th width="120">Status</th>
    	<th width="80">Aksi</th>
  	</tr>
  </thead>
  <tbody>
	
  	@if(!empty($pelamar))
  		<?php $no = 1; ?>
		@foreach($pelamar as $p)
			<tr>
		    	<td>{{ $no }}</td>
		    	<td>{{ $p->nama }}</td>
		    	<td>{{ $p->email }}</td>
		    	<td>{{ $p->alamat }}</td>
		    	<td>{{ $p->kemampuan }}</td>
		    	<td><a href="{{ url('pelamar/status/'.$p->id) }}" title="Ubah">{!! $p->status == 0 ? "<span class='ui grey label'>Tidak Aktif</span>" : "<span class='ui green label'>Aktif</span>" !!}</a></td>
		    	<td>
		    		<form action="{{ url('pelamar/'.$p->id) }}" method="POST" id="my-form-{{ $no }}">
		    			{{ csrf_field() }}
		    			{{ method_field('DELETE') }}
		    			<button type="submit" class="my-form-{{ $no }} btn-delete" style="float: right" title="Hapus">
		    				<i class="trash icon" title="Hapus"></i>
		    			</button>
		    		</form>
		    		<a href="#"><i class="eye icon" title="Detail" onclick="$('#modal-{{ $p->id }}').modal('show')"></i></a>

		    		<!-- Modal for detail -->
		    	
			    	<div class="ui modal" id="{{ 'modal-'.$p->id }}">
					  <div class="header">Detail Pelamar</div>
					  <div class="image content">
					    <div class="ui small image">
					      <img src="{{ asset('images/logo.jpg') }}">
					    </div>
					    <div class="description">
					      <div class="ui header">{{ $p->nama }}</div>
					      <div class="ui divided selection list">
							  <a class="item">
							    <div class="ui horizontal label">Alamat</div> {{ $p->alamat }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Email</div> {{ $p->email }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Telepon</div> {{ $p->telepon }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Pendidikan</div> {{ $p->pendidikan }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Kemampuan</div> {{ $p->kemampuan }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">CV</div> <i class="right floated download icon"></i>
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Facebook</div> {{ !empty($p->sosmed_fb) ? $p->sosmed_fb : '-' }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Twitter</div> {{ !empty($p->sosmed_tw) ? $p->sosmed_tw : '-' }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Instagram</div> {{ !empty($p->sosmedig) ? $p->sosmed_ig : '-' }}
							  </a>
						   </div>

					    </div>
					  </div>
					  <div class="actions">
					    <div class="ui black deny button">Tutup</div>
					  </div>
					</div>
		    	</td>
		    </tr>
		    <?php $no++; ?>
		@endforeach
  	@else
		<tr>
			<td colspan="7">Belum ada data!</td>
		</tr>
  	@endif

  </tbody>
</table>

<!-- Pagination -->
<div class="ui right floated pagination menu">
	<a class="icon item" href="{{ $pelamar->previousPageUrl() }}"><i class="left chevron icon"></i></a>
	<a class="item">{{ $pelamar->currentPage() }}</a>
	<a class="icon item" href="{{ $pelamar->nextPageUrl() }}"><i class="right chevron icon"></i></a>
</div>

@endsection