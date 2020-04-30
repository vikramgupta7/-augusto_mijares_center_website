<?php 
	include("config/db_connect.php");

	//make query
	$sql = "SELECT * from videos";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$videos = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($videos);
	mysqli_free_result($result);
	mysqli_close($connection);
 ?>



<!DOCTYPE html>
<html>
<?php include("templates/head.php"); ?>
<body>
	
	<?php include("templates/navigation.php"); ?>

		
	<div id="top">
		<p>
			<img src="images/logo.png" alt="Augusto Mijares Center">
			<h3>
				SOMOS UN EQUIPO INTERDISCIPLINARIO
			</h3>
		</p>
	</div>

	<div class="container">			
		<div class="grid" id="page_videos_grid1">
			<?php foreach ($videos as $video) : ?>
				<div class="video_box purple">
					<div class="video-container">
						<iframe src="<?php echo 'https://www.youtube.com/embed/' . $video['video_url'] ?>"></iframe>
					</div>
					<p class="text">
						<?php echo $video['video_description']; ?>
					</p>	
				</div>
			<?php endforeach; ?>
		</div>
	</div>


	<?php include("templates/footer.php"); ?>

	

</body>

</html>