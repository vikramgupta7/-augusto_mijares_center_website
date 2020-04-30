<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from users";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($users);
	mysqli_free_result($result);

	// print_r($_POST);

	if($_POST['type'] == 'added')
	{
		$user_name = $_POST['user_name'];
		$user_role = $_POST['user_role'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		// echo $video_title;		

		$sql = "INSERT INTO users(page_id, user_name, user_email, user_password, user_role) VALUES (8,'$user_name', '$user_email', '$user_password', '$user_role');";
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

		$sql = "UPDATE users SET uid=(@newid:=@newid+1) ORDER BY uid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:users.php');
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';

	}


	elseif($_POST['type'] == 'delete')
	{
		// echo 'Delete chal raha hai';
		$user_name = $_POST['user_name'];
		$user_role = $_POST['user_role'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_selection = $_POST['user_selection'];
		// echo $video_selection;
		$sql = "DELETE FROM users WHERE uid = $user_selection";
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

		$sql = "UPDATE users SET uid=(@newid:=@newid+1) ORDER BY uid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:users.php');
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
	}



	if($_POST['type'] == 'update')
	{
		$user_name = $_POST['user_name'];
		$user_role = $_POST['user_role'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_selection = $_POST['user_selection'];
		// echo $video_title;
		// print_r($_POST);
		$sql = "UPDATE users SET page_id=8, user_name='$user_name', user_email='$user_email', user_password='$user_password', user_role='$user_role' WHERE uid='$user_selection';";

		if (mysqli_query($connection, $sql)) {
			// echo 'Updated';
			sleep(2);
			header('Location:users.php');
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
		<form class="box container" action="users_edit.php" method="post">
			Name:
			<br>
			<input type="text" name="user_name" required="required" value="<?php echo $users[$_POST['user_selection']-1]['user_name']; ?>">
			<br>
			<br>
			Role:
			<br>	
			<input type="text" name="user_role" required="required" value="<?php echo $users[$_POST['user_selection']-1]['user_role']; ?>">
			<br>
			<br>
			Email:
			<br>	
			<input type="text" name="user_email" required="required" value="<?php echo $users[$_POST['user_selection']-1]['user_email']; ?>">
			<br>
			<br>
			Password:
			<br>	
			<input type="text" name="user_password" required="required" value="<?php echo $users[$_POST['user_selection']-1]['user_password']; ?>">
			<br>
			<br>
			<input type="hidden" name="user_selection" value="<?php echo $_POST['user_selection']; ?>" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	<?php elseif ($_POST['type'] == 'add'): ?>
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
			<input type="hidden" name="user_selection" value="<?php echo $_POST['user_selection']; ?>" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	<?php endif; ?>
</body>