<!DOCTYPE html>
<html>
	@include("admin.templates.head")

<body>

	@include("admin.templates.navigation")

	@if($projectsForm['type']=='edit')
		<form class="box container" action="" method="post">
			Project Name:
			<br>
			<input type="text" name="project_name" required="required" value="{{$projects[$projectsForm['project_selection']-1]['project_name']}}">
			<br>
			<br>
			Project Description:
			<br>
			<textarea name="project_description" id="" cols="100" rows="15">{{$projects[$projectsForm['project_selection']-1]['project_desc']}}</textarea>
			<br>
			<br>
			Project Image:
			<br>	
			<input type="text" name="project_image" required="required" value="{{$projects[$projectsForm['project_selection']-1]['project_image']}}">
			<br>
			<br>
			<input type="hidden" name="project_selection" value="{{$_POST['project_selection']}}"/>
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	@elseif ($projectsForm['type'] == 'add')
		<form class="box container" action="" method="post">
			Project Name:
			<br>
			<input type="text" name="project_name" required="required">
			<br>
			<br>
			Project Description:
			<br>
			<textarea name="project_description" id="" cols="100" rows="15" required></textarea>
			<br>
			<br>
			Project Image:
			<br>	
			<input type="text" name="project_image" required="required">
			<br>
			<br>
			<input type="hidden" name="project_selection" value="{{$projectsForm['project_selection']}}" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	@endif
</body>