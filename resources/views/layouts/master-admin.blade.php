<!DOCTYPE html>
<html>
<head>
	<title>Pengen Kerja - Administrator</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/semanticui/semantic.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-admin.css') }}">
	<!-- Sweetalert -->
	<link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
</head>
<body>

	<div class="ui top attached demo menu">
	  <a class="item sidebar-toggle">
	    <i class="sidebar icon"></i> Menu
	  </a>
	  <div class="ui right floated simple dropdown item">Nur Muhammad
	    <i class="dropdown icon"></i>
	    <div class="menu">
	      <a href="#" class="item"><i class="setting icon"></i>Pengaturan</a>
	      <a href="#" class="item"><i class="sign out icon"></i>Keluar</a>
	    </div>
	  </div>
	  
	</div>

	<div class="ui bottom attached segment pushable" style="border: none">
	  <div class="ui inverted left vertical sidebar menu">
	  	<a class="item" href="{{ url('logout') }}">
	    	<h4 class="ui grey header">Nur Muhammad</h4>
	        <p>Sign Out</p>
	    </a>
	    <a class="item">
	      <i class="block layout icon"></i> Dashboard
	    </a>	    
	    <a class="item" href="{{ url('lowongan') }}">
	      <i class="block layout icon"></i> Lowongan
	    </a>
	    <a class="item" href="{{ url('penyedia') }}">
	      <i class="smile icon"></i> Penyedia
	    </a>
	    <a class="item" href="{{ url('pelamar') }}">
	      <i class="smile icon"></i> Pelamar
	    </a>
	  </div>
	  <div class="pusher">
	    <div class="ui basic segment">
	      <h3 class="ui header">@yield('content-title')</h3>

	      @yield('content')

		</div>
		
	    </div>
	  </div>
	
	<script type="text/javascript" src="{{ asset('vendor/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor/semanticui/semantic.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom-admin.js') }}"></script>
	<!-- Sweetalert -->
	<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('js/sweetalert-custom.js') }}"></script>
	@include('sweet::alert')
</body>
</html>