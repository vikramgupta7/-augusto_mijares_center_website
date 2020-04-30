<!DOCTYPE html>
<html>
@include("admin.templates.head")
<body>

	@include("admin.templates.navigation");

	<form action="" method="post">
		@for($i=0;$i<count($members);$i++)
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="member_selection" value="{{$i+1}}" required @if ($i == 0) checked @endif>
					<img src="../{{$members[$i]['member_image']}}" alt="{{$members[$i]['member_name']}}">
					<div class="description">
						<h1>{{$members[$i]['member_name']}}</h1>
						<p>{!! nl2br(e($members[$i]['member_desc'])) !!}</p>
						<p>Phone : {{$members[$i]['member_phone']}}</p>
						<p>Email : {{$members[$i]['member_email']}}</p>
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