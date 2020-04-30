<!DOCTYPE html>
<html>
@include("admin.templates.head")
<body>
	@include("admin.templates.navigation")
	@include("admin.templates.user")

	<form action="" method="post">
		@for($i=0;$i<count($users);$i++)
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="user_selection" value="{{$i+1}}" required @if ($i == 0) checked @endif>
					<img src="
						@if($users[$i] ['user_role'] == 'admin')
							images/admin.png
						@elseif ($users[$i] ['user_role'] == 'user')
							images/user.png
						@endif
					 		" alt="{{$users[$i]['user_name']}}">
					<div class="description">
						<h1>{{$users[$i]['user_name']}}</h1>
						<p>Role : {{$users[$i] ['user_role']}}</p>
						<p>Email : {{$users[$i]['user_email']}}</p>
						<p>Password : {{$users[$i]['user_password']}}</p>
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