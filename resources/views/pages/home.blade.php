<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- properti -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/semanticui/semantic.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<title>PengenKerja.ID</title>
</head>
<body>
	<!-- main content -->
	<div class="pusher">
		<div class="ui vertical aligned center segment landing inverted" style="background: url(../images/city.jpg) #103d50 70% 30% repeat-x">
			<div class="transbg">
				<div class="ui container">
					<div class="ui secondary inverted top large point menu">
						<div class="right item">
							<div class="ui buttons">
								<button class="ui button black">
									<a href="#" ><i class="sign in icon"></i>Login</a>
								</button>
								<div class="or"></div>
								<button class="ui button green">
									<i class="user icon"></i>Sign Up 
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="ui container text">
					<h1 class="ui header centered inverted">Cari Pekerjaan Mu</h1>
					<div class="container fluid centered findbg">
						<form class="ui form">
							<div class="fields">
								<div class="fourteen wide field">
									<div class="ui search">
										<div class="ui left icon input">
											<i class="inverted circular blue suitcase icon"></i>
											<input class="promt" type="text" name="pekerjaan" placeholder="Find a Job">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>					
			</div>
		</div>
		<div class="ui container company">
			<div class="ui two column grid">
				<div class="eleven wide column">
					<div class="column">
						<div class="ui three column grid">
							@if (!empty($lowongan))
								@foreach($lowongan as $low)
									<div class="column" style="text-align: center">
										<p align="center">
							     			<img class="ui small rounded top aligned tiny image" src="{{ asset('uploads/'.$low->penyedia->logo) }}">
							     		</p>
							     		<div style="clear: both"></div>
							     		<h4>{{ $low->posisi }}</h4>
							     		<p>{{ str_limit($low->deskripsi, 50) }}</p>
							     		<button class="ui primary button">Detail</button>
							  		</div>
								@endforeach
							@else 	
								<p>Belum ada lowongan pekerjaan.</p>
							@endif
						</div>
					</div>
						
				</div>
				<div class="five wide column">
					<div class="column">
						<div class="ui middle aligned divided right floated list">
							<h3 class="ui header">Jenis Pekerjaan</h3>
						  	<div class="item">
							    <div class="content">
						      		<a class="header" href="#">Daniel Louise</a>
						      		<p>rsanya sungguh indah sekali ketika begadang bikin ginian</p>
						   		</div>
						  	</div>
							<div class="item">
							    <div class="content">
							    	<a class="header" href="#">Daniel Louise</a>
							    	<p>lorem ipsum dolor sit amet tak kan selamanya hasadahfdfdg dfs sdfgf fg</p>
							    </div>
							</div>
							<div class="item">
							    <div class="content">
							      <a class="header" href="#">Daniel Louise</a>
							      <p>lorem ipsum dolor sit amet begadang belajar semantic ui brroooh</p>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ui container footer">
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
	</div>
	<script type="text/javascript" src="{{ asset('vendor/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor/semanticui/semantic.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('css/custom.js') }}"></script>
</body>
</html>