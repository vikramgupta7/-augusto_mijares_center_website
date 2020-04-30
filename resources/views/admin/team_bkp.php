<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from members";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

	<form action="team_edit.php" method="post">
		<?php for($i=0;$i<count($members);$i++): ?>
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="member_selection" value="<?php echo $i+1 ?>" required <?php if ($i == 0) echo 'checked';?>>
					<img src="<?php echo "../".$members[$i]['member_image']; ?>" alt="<?php echo $members[$i]['member_name']; ?>">
					<div class="description">
						<h1><?php echo $members[$i]['member_name']; ?></h1>
						<p><?php echo nl2br($members[$i]['member_desc']); ?></p>
						<p>Phone : <?php echo $members[$i]['member_phone'] ?></p>
						<p>Email : <?php echo $members[$i]['member_email'] ?></p>
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