<!DOCTYPE html>
<html>
	@include("admin.templates.head")

<body>

	@include("admin.templates.navigation")
	
	@if ($userForm['type']=='edit')
		<form class="box container" action="users_edit.php" method="post">
			Name:
			<br>
			<input type="text" name="user_name" required="required" value="{{$users[$userForm['user_selection']-1]['user_name']}}">
			<br>
			<br>
			Role:
			<br>	
			<input type="text" name="user_role" required="required" value="{{$users[$userForm['user_selection']-1]['user_role']}}">
			<br>
			<br>
			Email:
			<br>	
			<input type="text" name="user_email" required="required" value="{{$users[$userForm['user_selection']-1]['user_email']}}">
			<br>
			<br>
			Password:
			<br>	
			<input type="text" name="user_password" required="required" value="{{$users[$userForm['user_selection']-1]['user_password']}}">
			<br>
			<br>
			<input type="hidden" name="user_selection" value="{{$userForm['user_selection']}}" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	@elseif ($userForm['type'] == 'add')
		<form class="box container" action="users_edit.php" method="post">
			Name:
			<br>
			<input type="text" name="user_name" required="required">
			<br>
			<br>
			Role:
			<br>	
			<input type="text" name="user_role" required="required">
			<br>
			<br>
			Email:
			<br>	
			<input type="text" name="user_email" required="required">
			<br>
			<br>
			Password:
			<br>	
			<input type="text" name="user_password" required="required">
			<br>
			<br>
			<input type="hidden" name="user_selection" value="{{$userForm['user_selection']}}" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	@endif
</body>