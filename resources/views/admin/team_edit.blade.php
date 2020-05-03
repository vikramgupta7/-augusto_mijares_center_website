<!DOCTYPE html>
<html>
	@include("admin.templates.head")

<body>

	@include("admin.templates.navigation")
	@include("admin.templates.user")
	
	@if ($teamForm['type']=='edit')
		<form class="box container" action="team_edit" method="post">
			@csrf
			Name:
			<br>
			<input type="text" name="member_name" required="required" value="{{$members[$teamForm['member_selection']-1]['member_name']}}">
			<br>
			<br>
			Description:
			<br>
			<textarea name="member_description" cols="100" rows="15">{{$members[$teamForm['member_selection']-1]['member_desc']}}</textarea>
			<br>
			<br>
			Phone:
			<br>	
			<input type="text" name="member_phone" required="required" value="{{$members[$teamForm['member_selection']-1]['member_phone']}}">
			<br>
			<br>
			Email:
			<br>	
			<input type="text" name="member_email" required="required" value="{{$members[$teamForm['member_selection']-1]['member_email']}}">
			<br>
			<br>
			Image:
			<br>	
			<input type="text" name="member_image" required="required" value="{{$members[$teamForm['member_selection']-1]['member_image']}}">
			<br>
			<br>
			<input type="hidden" name="member_selection" value="{{$teamForm['member_selection']}}" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	@elseif ($teamForm['type'] == 'add')
		<form class="box container" action="team_edit" method="post">
			@csrf
			Name:
			<br>
			<input type="text" name="member_name" required="required">
			<br>
			<br>
			Description:
			<br>
			<textarea name="member_description" cols="100" rows="15"></textarea>
			<br>
			<br>
			Phone:
			<br>	
			<input type="text" name="member_phone" required="required">
			<br>
			<br>
			Email:
			<br>	
			<input type="text" name="member_email" required="required">
			<br>
			<br>
			Image:
			<br>	
			<input type="text" name="member_image" required="required">
			<br>
			<br>
			<input type="hidden" name="member_selection" value="{{$teamForm['member_selection']}}" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	@endif
</body>