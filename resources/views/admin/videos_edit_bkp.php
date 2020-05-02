<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from videos";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$videos = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($videos);
	mysqli_free_result($result);

	// print_r($_POST);

	if($_POST['type'] == 'added')
	{
		$video_title = $_POST['video_title'];
		$video_description = $_POST['video_description'];
		$video_url = $_POST['video_url'];
		// echo $video_title;		

		$sql = "INSERT INTO videos(page_id, video_title, video_description, video_url) VALUES (6,'$video_title', '$video_description', '$video_url');";
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

		$sql = "UPDATE events SET vid=(@newid:=@newid+1) ORDER BY vid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:videos.php');
			echo "<script>location.href='videos.php';</script>";
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';

	}


	elseif($_POST['type'] == 'delete')
	{
		// echo 'Delete chal raha hai';
		$video_title = $_POST['video_title'];
		$video_description = $_POST['video_description'];
		$video_url = $_POST['video_url'];
		$video_selection = $_POST['video_selection'];
		// echo $video_selection;
		$sql = "DELETE FROM videos WHERE vid = $video_selection";
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

		$sql = "UPDATE videos SET vid=(@newid:=@newid+1) ORDER BY vid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:videos.php');
			echo "<script>location.href='videos.php';</script>";
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
	}



	if($_POST['type'] == 'update')
	{
		$video_title = $_POST['video_title'];
		$video_description = $_POST['video_description'];
		$video_url = $_POST['video_url'];
		$video_selection = $_POST['video_selection'];
		// echo $video_title;
		// print_r($_POST);
		$sql = "UPDATE videos SET page_id=6, video_title='$video_title', video_description='$video_description', video_url='$video_url' WHERE vid='$video_selection';";

		if (mysqli_query($connection, $sql)) {
			// echo 'Updated';
			sleep(2);
			header('Location:videos.php');
			echo "<script>location.href='videos.php';</script>";
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
		<form class="box container" action="videos_edit.php" method="post">
			Video Title:
			<br>
			<input type="text" name="video_title" required="required" value="<?php echo $videos[$_POST['video_selection']-1]['video_title']; ?>">
			<br>
			<br>
			Video Description:
			<br>
			<textarea name="video_description" cols="100" rows="15"><?php echo $videos[$_POST['video_selection']-1]['video_description']; ?></textarea>
			<br>
			<br>
			Video URL:
			<br>	
			<input type="text" name="video_url" required="required" value="<?php echo $videos[$_POST['video_selection']-1]['video_url']; ?>">
			<br>
			<br>
			<input type="hidden" name="video_selection" value="<?php echo $_POST['video_selection']; ?>" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	<?php elseif ($_POST['type'] == 'add'): ?>
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
			<input type="hidden" name="video_selection" value="<?php echo $_POST['video_selection']; ?>" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	<?php endif; ?>
</body>