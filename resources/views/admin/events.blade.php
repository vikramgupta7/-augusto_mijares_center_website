		<!DOCTYPE html>
<html>
	@include("admin.templates.head")

<body>

	@include("admin.templates.navigation")
	@include("admin.templates.user")
	
	<form action="events" method="post">
	@csrf
		@for($i=0;$i<count($events);$i++)
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="event_selection" value="{{$i+1}}" required @if ($i == 0) checked @endif>
					<img src="../{{$events[$i]['event_image']}}" alt="{{$events[$i]['event_title']}}">
					<div class="description">
						<h1>{{$events[$i]['event_title']}}</h1>
						<p>{!! nl2br(e($events[$i]['event_desc'])) !!}</p>
					</div>
				</div>
			</div>
		@endfor

		<div class="button_container">
			<button type="submit" name="type" value="edit">Edit</button>
			<button type="submit" name="type" value="add">Add</button>
		</div>
	</form>
</body>