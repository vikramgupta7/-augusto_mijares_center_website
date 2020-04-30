<!DOCTYPE html>
<html>
@include("templates.head")
<body>
	@include("templates.navigation")
	@include("admin.templates.user")

	<div class="container">
		<div id="top">
			<p>
				<img class="logo_small" src="images/logo.png" alt="Augusto Mijares Center">
				<h2>
				SOMOS UN EQUIPO INTERDISCIPLINARIO
				</h2>
			</p>
		</div>

		
		<div class="grid" id="page_team_grid1">
			@foreach($members as $member)
				<div class="info_box purple">
					<img class="scaled_photos" src="{{$member['member_image']}}" alt="{{$member['member_name']}}">
					 <h4>{{$member['member_name']}}</h4>
					 <p class="text">
					 	{{$member['member_desc']}}
					 	<br>
					 	Teléf.: {{$member['member_phone']}}
					 	<br>
			 	 		E-mail: {{$member['member_email']}}
					 </p>
				</div>
			@endforeach
		</div>

	</div>

	@include("templates.footer")

</body>

</html>