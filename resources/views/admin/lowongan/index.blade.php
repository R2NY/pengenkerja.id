@extends('layouts.master-admin')

@section('content-title', 'Lowongan')

@section('content')

<table class="ui celled striped table">
  <thead>
    <tr>
    	<th colspan="7">Daftar Lowongan</th>
  	</tr>
  	<tr>
    	<th width="40">#</th>
    	<th>Posisi</th>
    	<th>Penyedia</th>
    	<th>Gaji</th>
    	<th width="120">Status</th>
    	<th width="80">Aksi</th>
  	</tr>
  </thead>
  <tbody>
	
  	@if(!empty($lowongan))
  		<?php $no = 1; $today = date('Y-m-d'); ?>
		@foreach($lowongan as $p)
			<tr>
		    	<td>{{ $no }}</td>
		    	<td>{{ $p->posisi }}</td>
		    	<td>{{ $p->penyedia->nama }}</td>
		    	<td>Rp {{ number_format($p->gaji, 2, ',', '.') }}</td>
		    	<td>{!! $today > $p->tgl_selesai ? "<span class='ui grey label'>Tidak Aktif</span>" : "<span class='ui green label'>Aktif</span>" !!}</td>
		    	<td>
		    		<form action="{{ url('lowongan/'.$p->id) }}" method="POST" id="my-form-{{ $no }}">
		    			{{ csrf_field() }}
		    			{{ method_field('DELETE') }}
		    			<button type="submit" class="my-form-{{ $no }} btn-delete" style="float: right" title="Hapus">
		    				<i class="trash icon" title="Hapus"></i>
		    			</button>
		    		</form>
		    		<a href="#"><i class="eye icon" title="Detail" onclick="$('#modal-{{ $p->id }}').modal('show')"></i></a>

		    		<!-- Modal for detail -->
		    	
			    	<div class="ui modal" id="{{ 'modal-'.$p->id }}">
					  <div class="header">Detail lowongan</div>
					  <div class="image content">
					    <div class="ui small image">
					      <img src="{{ asset('images/logo.jpg') }}">
					    </div>
					    <div class="description">
					      <div class="ui header">{{ $p->penyedia->nama }}</div>
					      <div class="ui divided selection list">
							  <a class="item">
							    <div class="ui horizontal label">Posisi</div> {{ $p->posisi }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Gaji</div> Rp {{ number_format($p->gaji, 2, ',', '.') }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Deadline</div> {{ $p->tgl_selesai }}
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Persyaratan</div>
							    <p>{{ $p->persyaratan }}</p>
							  </a>
							  <a class="item">
							    <div class="ui horizontal label">Deskripsi</div>
							    <p>{{ $p->deskripsi }}</p>
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
	<a class="icon item" href="{{ $lowongan->previousPageUrl() }}"><i class="left chevron icon"></i></a>
	<a class="item">{{ $lowongan->currentPage() }}</a>
	<a class="icon item" href="{{ $lowongan->nextPageUrl() }}"><i class="right chevron icon"></i></a>
</div>

@endsection