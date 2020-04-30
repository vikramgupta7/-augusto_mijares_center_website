<!DOCTYPE html>
<html>
@include("admin.templates.head")
<body>
	@include("admin.templates.navigation")
	@include("admin.templates.user")
	<form action="" method="post">
		@for($i=0;$i<count($videos);$i++)
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="video_selection" value="{{$i+1}}" required @if ($i == 0) checked @endif>
					<img src="https://img.youtube.com/vi/{{$videos[$i]['video_url']}}/hqdefault.jpg" alt="{{$videos[$i]['video_title']}}">
					<div class="description">
						<h1>{{$videos[$i]['video_title']}}</h1>
						<p>{!! nl2br(e($videos[$i]['video_description'])) !!}</p>
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