<!DOCTYPE html>
<html>
@include("templates.head")
<body>
	@include("templates.navigation")

	<div class="grid" id="page_events_grid1">	
		@for($i=0;$i<count($events);$i++)
			@if($i%2==0)
				<div class="box">
					<h3>{{$events[$i]['event_title']}}</h3>
					<p class="text">
						{!! nl2br(e($events[$i]['event_desc'])) !!}
					</p>
				</div>
				<div class="box">
					<p><img class="scaled_photos" src="{{$events[$i]['event_image']}}" alt="{{$events[$i]['event_title']}}"></p>
				</div>
			@elseif ($i%2==1)
				<div class="box">
					<p><img class="scaled_photos" src="{{$events[$i]['event_image']}}" alt="{{$events[$i]['event_title']}}"></p>
				</div>
				<div class="box">
					<h3>{{$events[$i]['event_title']}}</h3>
					<p class="text">
						{!! nl2br(e($events[$i]['event_desc'])) !!}
					</p>
				</div>
			@endif
		@endfor
	</div>

	@include("templates.footer")

</body>

</html>