<!DOCTYPE html>
<html>
	@include("admin.templates.head")
<body>

	@include("admin.templates.navigation");
	<form action="" method="post">
		@for($i=0;$i<count($projects);$i++)
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="project_selection" value="{{$i+1}}" required @if($i == 0) checked @endif>
					<img src="../{{$projects[$i]['project_image']}}" alt="{{$projects[$i]['project_name']}}">
					<div class="description">
						<h1>{{$projects[$i]['project_name']}}</h1>
						<p>{{$projects[$i]['project_desc']}}</p>
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