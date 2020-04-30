<!DOCTYPE html>
<html>
@include("templates.head")
<body>
	
	@include("templates.navigation")

		
	<div id="top">
		<p>
			<img src="images/logo.png" alt="Augusto Mijares Center">
			<h3>
				SOMOS UN EQUIPO INTERDISCIPLINARIO
			</h3>
		</p>
	</div>

	<div class="container">			
		<div class="grid" id="page_videos_grid1">
			@foreach ($videos as $video)
				<div class="video_box purple">
					<div class="video-container">
						<iframe src="{{'https://www.youtube.com/embed/' . $video['video_url']}}"></iframe>
					</div>
					<p class="text">
						{{$video['video_description']}}
					</p>	
				</div>
			@endforeach
		</div>
	</div>


	@include("templates.footer")

	

</body>

</html>