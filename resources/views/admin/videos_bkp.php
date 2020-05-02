<?php 
	include("../config/db_connect.php");

	//make query
	$sql = "SELECT * from videos";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$videos = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

	<form action="videos_edit.php" method="post">
		<?php for($i=0;$i<count($videos);$i++): ?>
			<div class="box">
				<div class="container">
					<input type="radio" class="radio" name="video_selection" value="<?php echo $i+1 ?>" required <?php if ($i == 0) echo 'checked';?>>
					<img src="<?php echo 'https://img.youtube.com/vi/'.$videos[$i]['video_url'].'/hqdefault.jpg'; ?>" alt="<?php echo $videos[$i]['video_title']; ?>">
					<div class="description">
						<h1><?php echo $videos[$i]['video_title']; ?></h1>
						<p><?php echo nl2br($videos[$i]['video_description']); ?></p>
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