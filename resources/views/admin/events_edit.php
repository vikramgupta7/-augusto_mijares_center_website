<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from events";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$events = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($projects);
	mysqli_free_result($result);

	// print_r($_POST);

	if($_POST['type'] == 'added')
	{
		$event_title = $_POST['event_title'];
		$event_description = $_POST['event_description'];
		$event_image = $_POST['event_image'];
		// echo $event_title;		

		$sql = "INSERT INTO events(page_id, event_title, event_desc, event_image) VALUES (5,'$event_title', '$event_description', '$event_image');";
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

		$sql = "UPDATE events SET eid=(@newid:=@newid+1) ORDER BY eid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:events.php');
			echo "<script>location.href='events.php';</script>";
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';

	}


	elseif($_POST['type'] == 'delete')
	{
		// echo 'Delete chal raha hai';
		$event_title = $_POST['event_title'];
		$event_description = $_POST['event_description'];
		$event_image = $_POST['event_image'];
		$event_selection = $_POST['event_selection'];
		// echo $event_selection;
		$sql = "DELETE FROM events WHERE eid = $event_selection";
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

		$sql = "UPDATE events SET eid=(@newid:=@newid+1) ORDER BY eid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:events.php');
			echo "<script>location.href='events.php';</script>";
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
	}



	if($_POST['type'] == 'update')
	{
		$event_title = $_POST['event_title'];
		$event_description = $_POST['event_description'];
		$event_image = $_POST['event_image'];
		$event_selection = $_POST['event_selection'];
		// echo $project_name;
		// print_r($_POST);
		$sql = "UPDATE events SET page_id=5, event_title='$event_title', event_desc='$event_description', event_image='$event_image' WHERE eid='$event_selection';";

		if (mysqli_query($connection, $sql)) {
			// echo 'Updated';
			sleep(2);
			header('Location:events.php');
			echo "<script>location.href='events.php';</script>";
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
		<form class="box container" action="events_edit.php" method="post">
			Event Title:
			<br>
			<input type="text" name="event_title" required="required" value="<?php echo $events[$_POST['event_selection']-1]['event_title']; ?>">
			<br>
			<br>
			Event Description:
			<br>
			<textarea name="event_description" cols="100" rows="15"><?php echo $events[$_POST['event_selection']-1]['event_desc']; ?></textarea>
			<br>
			<br>
			Event Image:
			<br>	
			<input type="text" name="event_image" required="required" value="<?php echo $events[$_POST['event_selection']-1]['event_image']; ?>">
			<br>
			<br>
			<input type="hidden" name="event_selection" value="<?php echo $_POST['event_selection']; ?>" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	<?php elseif ($_POST['type'] == 'add'): ?>
		<form class="box container" action="events_edit.php" method="post">
			Event Title:
			<br>
			<input type="text" name="event_title" required="required">
			<br>
			<br>
			Evet Description:
			<br>
			<textarea name="event_description" id="" cols="100" rows="15" required></textarea>
			<br>
			<br>
			Event Image:
			<br>	
			<input type="text" name="event_image" required="required">
			<br>
			<br>
			<input type="hidden" name="event_selection" value="<?php echo $_POST['event_selection']; ?>" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	<?php endif; ?>
</body>