<?php 

	include("config/db_connect.php");

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
<?php include("templates/head.blade.php"); ?>
<body>
	<?php include("templates/navigation.blade.php"); ?>

	<div class="container">
		<div id="top">
			<p>
				<img class="logo_small" src="images/logo.png" alt="Augusto Mijares Center">
				<h4>
				RESPONSABILIDAD SOCIAL UNIVERSITARIA​ Y DESARROLLO SUSTENTABLE ¿QUÉ Y PARA QUÉ?
				</h4>
			</p>
		</div>
	</div>


	<div class="grid" id="page_projects_grid1">

	<?php for($i=0;$i<count($projects);$i++) : ?>
		<?php if($i%2==0): ?>
			<div class="box purple">
				<p>		
					<img class="scaled_photos" src="<?php echo $projects[$i]['project_image']; ?>" alt="<?php echo $projects[$i]['project_name']; ?>">
				</p>
			</div>

			<div class="box purple">		
				<p class="text left">
					<?php echo $projects[$i]['project_desc']; ?>
				</p>
			</div>
		<?php elseif ($i%2==1): ?>
			<div class="box purple">		
				<p class="text left">
					<?php echo $projects[$i]['project_desc']; ?>
				</p>
			</div>

			<div class="box purple">
				<p>		
					<img class="scaled_photos" src="<?php echo $projects[$i]['project_image']; ?>" alt="<?php echo $projects[$i]['project_name']; ?>">
				</p>
			</div>
		<?php endif; ?>
	<?php endfor; ?>

	</div>



	<?php include("templates/footer.blade.php"); ?>


</body>

</html>