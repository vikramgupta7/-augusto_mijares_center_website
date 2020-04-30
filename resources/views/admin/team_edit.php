<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from members";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($videos);
	mysqli_free_result($result);

	// print_r($_POST);

	if($_POST['type'] == 'added')
	{
		$member_name = $_POST['member_name'];
		$member_description = $_POST['member_description'];
		$member_phone = $_POST['member_phone'];
		$member_email = $_POST['member_email'];
		$member_image = $_POST['member_image'];
		// echo $video_title;		

		$sql = "INSERT INTO members(page_id, member_name, member_desc, member_email, member_phone, member_image) VALUES (7,'$member_name', '$member_description', '$member_email', '$member_phone', '$member_image');";
		if (mysqli_query($connection, $sql))
			// echo 'ADDED New RECORD into table';
			echo '';
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';


		$sql = "SET @newid=0;";
		if (mysqli_query($connection, $sql))
			// echo 'Set SQL Variable';
			echo '';
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';		

		$sql = "UPDATE members SET mid=(@newid:=@newid+1) ORDER BY mid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:team.php');
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';

	}


	elseif($_POST['type'] == 'delete')
	{
		// echo 'Delete chal raha hai';
		$member_name = $_POST['member_name'];
		$member_description = $_POST['member_description'];
		$member_phone = $_POST['member_phone'];
		$member_email = $_POST['member_email'];
		$member_image = $_POST['member_image'];
		$member_selection = $_POST['member_selection'];
		// echo $video_selection;
		$sql = "DELETE FROM members WHERE mid = $member_selection";
		if (mysqli_query($connection, $sql))
			// echo 'Deleted Record.';
			echo '';
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
		$sql = "SET @newid=0;";
		if (mysqli_query($connection, $sql))
			// echo 'Set SQL Variable';
			echo '';
		else
			// echo 'query error: '. mysqli_error($connection);		
			echo '';

		$sql = "UPDATE members SET mid=(@newid:=@newid+1) ORDER BY mid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:team.php');
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
	}



	if($_POST['type'] == 'update')
	{
		$member_name = $_POST['member_name'];
		$member_description = $_POST['member_description'];
		$member_phone = $_POST['member_phone'];
		$member_email = $_POST['member_email'];
		$member_image = $_POST['member_image'];
		$member_selection = $_POST['member_selection'];
		// echo $video_title;
		// print_r($_POST);
		$sql = "UPDATE members SET page_id=7, member_name='$member_name', member_desc='$member_description', member_email='$member_email', member_phone='$member_phone', member_image='$member_image'  WHERE mid='$member_selection';";

		if (mysqli_query($connection, $sql)) {
			// echo 'Updated';
			sleep(2);
			header('Location:team.php');
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
	}


	mysqli_close($connection);

?>


<!DOCTYPE html>
<html>
	<?php include("templates/head.php") ?>

<body>

	<?php include("templates/navigation.php"); ?>
	<?php include("templates/user.php") ?>
	
	<?php if ($_POST['type']=='edit'): ?>
		<form class="box container" action="team_edit.php" method="post">
			Name:
			<br>
			<input type="text" name="member_name" required="required" value="<?php echo $members[$_POST['member_selection']-1]['member_name']; ?>">
			<br>
			<br>
			Description:
			<br>
			<textarea name="member_description" cols="100" rows="15"><?php echo $members[$_POST['member_selection']-1]['member_desc']; ?></textarea>
			<br>
			<br>
			Phone:
			<br>	
			<input type="text" name="member_phone" required="required" value="<?php echo $members[$_POST['member_selection']-1]['member_phone']; ?>">
			<br>
			<br>
			Email:
			<br>	
			<input type="text" name="member_email" required="required" value="<?php echo $members[$_POST['member_selection']-1]['member_email']; ?>">
			<br>
			<br>
			Image:
			<br>	
			<input type="text" name="member_image" required="required" value="<?php echo $members[$_POST['member_selection']-1]['member_image']; ?>">
			<br>
			<br>
			<input type="hidden" name="member_selection" value="<?php echo $_POST['member_selection']; ?>" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	<?php elseif ($_POST['type'] == 'add'): ?>
		<form class="box container" action="team_edit.php" method="post">
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
			<input type="hidden" name="member_selection" value="<?php echo $_POST['member_selection']; ?>" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	<?php endif; ?>
</body>