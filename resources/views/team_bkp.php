<?php 

	include("config/db_connect.php");

	//make query
	$sql = "SELECT * from members";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($members);
	mysqli_free_result($result);

	mysqli_close($connection);
 ?>



<!DOCTYPE html>
<html>
<?php include("templates/head.php"); ?>
<body>
	<?php include("templates/navigation.php"); ?>
	

	<div class="container">
		<div id="top">
			<p>
				<img class="logo_small" src="images/logo.png" alt="Augusto Mijares Center">
				<h2>
				SOMOS UN EQUIPO INTERDISCIPLINARIO
				</h2>
			</p>
		</div>

		
		<div class="grid" id="page_team_grid1">
			<?php foreach($members as $member) : ?>
				<div class="info_box purple">
					<img class="scaled_photos" src="<?php echo $member['member_image']; ?>" alt="<?php echo $member['member_name']; ?>">
					 <h4><?php echo $member['member_name']; ?></h4>
					 <p class="text">
					 	<?php echo $member['member_desc']; ?>
					 	<br>
					 	Teléf.: <?php echo $member['member_phone']; ?>
					 	<br>
			 	 		E-mail: <?php echo $member['member_email']; ?>
					 </p>
				</div>
			<?php endforeach; ?>
		
		
		</div>

	</div>

	<?php include("templates/footer.php"); ?>

</body>

</html>