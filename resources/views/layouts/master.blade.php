<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compqtible" content="IE=edge,chrome=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1.0">
		<!-- properti -->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/semanticui/semantic.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

		<title>@yield('title') - PengenKerja.ID</title>
	</head>
<body>
	<div class="ui grid navbar" style="padding-top: 25px;">
		<div class="four column row">
			<div class="left floated column search">
				<div class="ui form">
					<div class="field">
						<div class="ui left icon input">
							<i class="inverted circular blue suitcase icon"></i>
							<input class="promt" type="text" name="pekerjaan" placeholder="Find a Job">
						</div>
					</div>
				</div>
			</div>
			<div class="right floated column">

				@if (!auth('pelamar')->check() || !auth('penyedia')->check())
					<div class="ui buttons">
						<button class="ui button black">
							<a href="#" ><i class="sign in icon"></i>Login</a>
						</button>
					<div class="or"></div>
						<button class="ui button green">
							<i class="user icon"></i>Sign Up 
						</button>
					</div>
				@else 
					<div class="ui right floated simple dropdown item user">User
					    <i class="dropdown icon"></i>
					    <div class="menu">
					    	<a href="#" class="item"><i class="write out icon"></i>Profile</a>
					      	<a href="#" class="item"><i class="setting icon"></i>Pengaturan</a>
					      	<a href="@yield('logout-link')" class="item"><i class="sign out icon"></i>Keluar</a>
					    </div>
					</div>
				@endif
			</div>
		</div>
	</div>


	<div class="ui {{ !empty($dash) ? '' : 'centered grid' }} container">
		
		@yield('content')

	</div>	
	<div class="ui container footer login">
			<div class="ui two column grid">
				<div class="four wide column">
					<div class="column">
						<div class="ui link list">
							<a class="item" href="#" >Tentang Kami</a>
							<a class="item" href="#" >Blabla</a>
						</div>
					</div>
				</div>
				<div class="four wide column">
					<div class="column">
						<div class="ui link list">
							<a class="item" href="#" >Blengbleng</a>
							<a class="item" href="#" >Linklink</a>
						</div>	
					</div>
				</div>
				<div class="four wide column">
					<div class="column">
						<div class="ui link list">
							<a class="item" href="#" >Apa Ini</a>
							<a class="item" href="#" >YEYEYEYEYE</a>
						</div>	
					</div>
				</div>
				<div class="four wide column">
					<div class="column">
						<div class="ui link list">
							<a class="item" href="#" >Apa itu</a>
							<a class="item" href="#" >YOYOYOYOYO</a>
						</div>	
					</div>
				</div>
			</div>
		</div>

	<script type="text/javascript" src="{{ asset('vendor/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor/semanticui/semantic.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

</body>
</html>