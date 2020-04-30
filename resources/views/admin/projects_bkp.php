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

	mysqli_close($connection);

	
	
?>

		
<!DOCTYPE html>
<html>
	<?php include("templates/head.php") ?>

<body>

	<?php include("templates/navigation.php"); ?>
	
	<?php include("templates/user.php") ?>

	<form action="projects_edit.php" method="post">
		<?php for($i=0;$i<count($projects);$i++): ?>
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="project_selection" value="<?php echo $i+1 ?>" required <?php if ($i == 0) echo 'checked';?>>
					<img src="<?php echo '../'.$projects[$i]['project_image']; ?>" alt="<?php echo $projects[$i]['project_name']; ?>">
					<div class="description">
						<h1><?php echo $projects[$i]['project_name']; ?></h1>
						<p><?php echo $projects[$i]['project_desc']; ?></p>
					</div>
				</div>
			</div>
		<?php endfor; ?>

		<div class="button_container">
			<button type="submit" name="type" value="edit">Edit</button>
			<button type="submit" name="type" value="add">Add</button>
		</div>
	</form>
</body>