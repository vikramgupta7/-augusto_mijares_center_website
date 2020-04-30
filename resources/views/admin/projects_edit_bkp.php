<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from projects";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($projects);
	mysqli_free_result($result);

	// print_r($_POST);

	if($_POST['type'] == 'added')
	{
		$project_name = $_POST['project_name'];
		$project_description = $_POST['project_description'];
		$project_image = $_POST['project_image'];
		// echo $project_name;		

		$sql = "INSERT INTO projects(page_id, project_name, project_desc, project_image) VALUES (4,'$project_name', '$project_description', '$project_image');";
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

		$sql = "UPDATE projects SET pid=(@newid:=@newid+1) ORDER BY pid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:projects.php');
			echo "<script>location.href='projects.php';</script>";
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';

	}


	elseif($_POST['type'] == 'delete')
	{
		// echo 'Delete chal raha hai';
		$project_name = $_POST['project_name'];
		$project_description = $_POST['project_description'];
		$project_image = $_POST['project_image'];
		$project_selection = $_POST['project_selection'];
		// echo $project_selection;
		$sql = "DELETE FROM projects WHERE pid = $project_selection";
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

		$sql = "UPDATE projects SET pid=(@newid:=@newid+1) ORDER BY pid;";
		if (mysqli_query($connection, $sql))
		{
			// echo 'Reindexed table';
			sleep(2);
			header('Location:projects.php');
			echo "<script>location.href='projects.php';</script>";
		}
		else
			// echo 'query error: '. mysqli_error($connection);
			echo '';
	}



	if($_POST['type'] == 'update')
	{
		$project_name = $_POST['project_name'];
		$project_description = $_POST['project_description'];
		$project_image = $_POST['project_image'];
		$project_selection = $_POST['project_selection'];
		// echo $project_name;
		// print_r($_POST);
		$sql = "UPDATE projects SET page_id=4, project_name='$project_name', project_desc='$project_description', project_image='$project_image' WHERE pid='$project_selection';";

		if (mysqli_query($connection, $sql)) {
			// echo 'Updated';
			sleep(2);
			header('Location:projects.php');
			echo "<script>location.href='projects.php';</script>";
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
		<form class="box container" action="projects_edit.php" method="post">
			Project Name:
			<br>
			<input type="text" name="project_name" required="required" value="<?php echo $projects[$_POST['project_selection']-1]['project_name']; ?>">
			<br>
			<br>
			Project Description:
			<br>
			<textarea name="project_description" id="" cols="100" rows="15"><?php echo $projects[$_POST['project_selection']-1]['project_desc']; ?></textarea>
			<br>
			<br>
			Project Image:
			<br>	
			<input type="text" name="project_image" required="required" value="<?php echo $projects[$_POST['project_selection']-1]['project_image']; ?>">
			<br>
			<br>
			<input type="hidden" name="project_selection" value="<?php echo $_POST['project_selection']; ?>" />
			<button type="submit" name="type" value="update">Update</button>
			<button type="submit" name="type" value="delete">Delete</button>
		</form>
	<?php elseif ($_POST['type'] == 'add'): ?>
		<form class="box container" action="projects_edit.php" method="post">
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
			<input type="hidden" name="project_selection" value="<?php echo $_POST['project_selection']; ?>" />
			<button type="submit" name="type" value="added">Add</button>
		</form>
	<?php endif; ?>
</body>