@if (session('success')) 
	<div class="ui positive message">
	  <i class="close icon"></i> {{ session('success') }}
	</div>
@endif