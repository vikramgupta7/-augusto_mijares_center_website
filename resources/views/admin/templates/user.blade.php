<div class="welcome">
	@if (session()->has('loginData'))
		<p style="text-align: center;">
			Welcome, {{session('loginData')['email']}}
			<a href="logout">(logout)</a>	
		</p>
	@else
	<script>location.href='../login';</script>
	@endif
 </div>  