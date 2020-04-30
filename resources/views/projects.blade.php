<!DOCTYPE html>
<html>

@include('templates.head')

<body>

@include('templates.navigation')

	<div class="container">
		<div id="top">
			<p>
				<img class="logo_small" src="images/logo.png" alt="Augusto Mijares Center">
				<h4>
				RESPONSABILIDAD SOCIAL UNIVERSITARIA​ Y DESARROLLO SUSTENTABLE ¿QUÉ Y PARA QUÉ?
				</h4>
			</p>
		</div>
	</div>

	<div class="grid" id="page_projects_grid1">

	@for($i=0;$i<count($projects);$i++)
		@if($i%2==0)
			<div class="box purple">
				<p>		
					<img class="scaled_photos" src="{{$projects[$i]['project_image']}}" alt="{{$projects[$i]['project_name']}}">
				</p>
			</div>

			<div class="box purple">		
				<p class="text left">
					{{$projects[$i]['project_desc']}}
				</p>
			</div>
		@elseif ($i%2==1)
			<div class="box purple">		
				<p class="text left">
					{{$projects[$i]['project_desc']}}
				</p>
			</div>

			<div class="box purple">
				<p>		
					<img class="scaled_photos" src="{{$projects[$i]['project_image']}}" alt="{{$projects[$i]['project_name']}}">
				</p>
			</div>
		@endif
	@endfor

	</div>

@include('templates.footer')

</body>

</html>
