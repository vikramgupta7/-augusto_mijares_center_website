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

	mysqli_close($connection);
	
?>

		
<!DOCTYPE html>
<html>
	<?php include("templates/head.php") ?>

<body>

	<?php include("templates/navigation.php"); ?>
	<?php include("templates/user.php") ?>

	<form action="users_edit.php" method="post">
		<?php for($i=0;$i<count($users);$i++): ?>
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="user_selection" value="<?php echo $i+1 ?>" required <?php if ($i == 0) echo 'checked';?>>
					<img src="
						<?php if($users[$i] ['user_role'] == 'admin')
							echo 'images/admin.png';
						 elseif ($users[$i] ['user_role'] == 'user')
							echo 'images/user.png';
						?>
					 		" alt="<?php echo $users[$i]['user_name']; ?>">
					<div class="description">
						<h1><?php echo $users[$i]['user_name']; ?></h1>
						<p>Role : <?php echo $users[$i] ['user_role']; ?></p>
						<p>Email : <?php echo $users[$i]['user_email']; ?></p>
						<p>Password : <?php echo $users[$i]['user_password'] ?></p>
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