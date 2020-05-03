<!DOCTYPE html>
<html>
@include("admin.templates.head")

<body>

	@include("admin.templates.navigation")
	@include("admin.templates.user")
	
	@if ($eventsForm['type']=='edit')
		<form class="box container" action="events_edit" method="post">
		@csrf
			Event Title:
			<br>
			<input type="text" name="event_title" required="required" value="{{$events[$eventsForm['event_selection']-1]['event_title']}}">
			<br>
			<br>
			Event Description:
			<br>
			<textarea name="event_description" cols="100" rows="15">{{$events[$eventsForm['event_selection']-1]['event_desc']}}</textarea>
			<br>
			<br>
			Event Image:
			<br>	
			<input type="text" name="event_image" required="required" value="{{$events[$eventsForm['event_selection']-1]['event_image']}}">
			<br>
			<br>
			<input type="hidden" name="event_selection" value="{{$eventsForm['event_selection']}}" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	@elseif ($eventsForm['type'] == 'add')
		<form class="box container" action="events_edit" method="post">
		@csrf
			Event Title:
			<br>
			<input type="text" name="event_title" required="required">
			<br>
			<br>
			Evet Description:
			<br>
			<textarea name="event_description" id="" cols="100" rows="15" required></textarea>
			<br>
			<br>
			Event Image:
			<br>	
			<input type="text" name="event_image" required="required">
			<br>
			<br>
			<input type="hidden" name="event_selection" value="{{$eventsForm['event_selection']}}" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	@endif
</body>