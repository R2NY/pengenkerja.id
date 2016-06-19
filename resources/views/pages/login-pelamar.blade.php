@include('common.errors')

<form action="{{ url('pelamar/login') }}" method="POST">
	{{ csrf_field() }}
	<label for="username">Username</label>
	<input type="text" name="username" id="username"> <br>
	<label for="password">Password</label>
	<input type="password" name="password" id="password"><br>
	<button type="submit">Login</button>
</form>