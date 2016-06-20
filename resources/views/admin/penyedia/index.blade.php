@extends('layouts.master-admin')

@section('content-title', 'Penyedia')

@section('content')

<table class="ui celled striped table">
  <thead>
    <tr>
    	<th colspan="7">Daftar Penyedia</th>
  	</tr>
  	<tr>
    	<th width="40">#</th>
    	<th>Logo</th>
    	<th>Nama</th>
    	<th>Email</th>
    	<th>Alamat</th>
    	<th width="120">Status</th>
    	<th width="80">Aksi</th>
  	</tr>
  </thead>
  <tbody>
	
  	@if(!empty($penyedia))
  		<?php $no = 1; ?>
		@foreach($penyedia as $p)
			<tr>
		    	<td>{{ $no }}</td>
		    	<td>{{ $p->logo }}</td>
		    	<td>{{ $p->nama }}</td>
		    	<td>{{ $p->email }}</td>
		    	<td>{{ $p->alamat }}</td>
		    	<td><a href="{{ url('penyedia/status/'.$p->id) }}" title="Ubah">{!! $p->status == 0 ? "<span class='ui grey label'>Tidak Aktif</span>" : "<span class='ui green label'>Aktif</span>" !!}</a></td>
		    	<td>
		    		<form action="{{ url('penyedia/'.$p->id) }}" method="POST" id="my-form-{{ $no }}">
		    			{{ csrf_field() }}
		    			{{ method_field('DELETE') }}
		    			<button type="submit" class="my-form-{{ $no }} btn-delete" style="float: right" title="Hapus">
		    				<i class="trash icon" title="Hapus"></i>
		    			</button>
		    		</form>
		    		<a href="#"><i class="eye icon" title="Detail" onclick="$('#modal-{{ $p->id }}').modal('show')"></i></a>

		    		<!-- Modal for detail -->
		    	
			    	<div class="ui modal" id="{{ 'modal-'.$p->id }}">
					  <div class="header">Detail Penyedia</div>
					  <div class="image content">
					    <div class="ui medium image">
					      <img src="{{ asset('images/logo.jpg') }}">
					    </div>
					    <div class="description">
					      <div class="ui header">{{ $p->nama }}</div>
					      <div class="ui divided selection list">
							  <a class="item">
							  	<div>&nbsp;</div>
							    <div class="ui horizontal label">Kategori</div> {{ $p->kategori->nama }}
							  </a>
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
							    <div class="ui horizontal label">Website</div> {{ $p->website }}
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
	<a class="icon item" href="{{ $penyedia->previousPageUrl() }}"><i class="left chevron icon"></i></a>
	<a class="item">{{ $penyedia->currentPage() }}</a>
	<a class="icon item" href="{{ $penyedia->nextPageUrl() }}"><i class="right chevron icon"></i></a>
</div>

@endsection