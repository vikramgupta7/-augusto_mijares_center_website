<!DOCTYPE html>
<html>
@include("admin.templates.head")

<body>

	@include("admin.templates.navigation")
	@if ($videosForm['type']=='edit')
		<form class="box container" action="videos_edit.php" method="post">
		@csrf
			Video Title:
			<br>
			<input type="text" name="video_title" required="required" value="{{$videos[$videosForm['video_selection']-1]['video_title']}}">
			<br>
			<br>
			Video Description:
			<br>
			<textarea name="video_description" cols="100" rows="15">{{$videos[$videosForm['video_selection']-1]['video_description']}}</textarea>
			<br>
			<br>
			Video URL:
			<br>	
			<input type="text" name="video_url" required="required" value="{{$videos[$videosForm['video_selection']-1]['video_url']}}">
			<br>
			<br>
			<input type="hidden" name="video_selection" value="{{$videosForm['video_selection']}}" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	@elseif ($videosForm['type'] == 'add')
		<form class="box container" action="videos_edit.php" method="post">
			Video Title:
			<br>
			<input type="text" name="video_title" required="required">
			<br>
			<br>
			Video Description:
			<br>
			<textarea name="video_description" id="" cols="100" rows="15" required></textarea>
			<br>
			<br>
			Video URL:
			<br>	
			<input type="text" name="video_url" required="required">
			<br>
			<br>
			<input type="hidden" name="video_selection" value="{{$videosForm['video_selection']}}" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	@endif
</body>