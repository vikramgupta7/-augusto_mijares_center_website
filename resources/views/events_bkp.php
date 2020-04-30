<?php 
	include("config/db_connect.php");

	//make query
	$sql = "SELECT * from events";
	// get the result.
	$result = mysqli_query($connection, $sql);
	//feth result in array format.
	$events = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// print_r($projects);
	mysqli_free_result($result);

	mysqli_close($connection);
 ?>



<!DOCTYPE html>
<html>
<?php include("templates/head.php"); ?>
<body>
	<?php include("templates/navigation.php"); ?>

	<div class="grid" id="page_events_grid1">	
		<?php for($i=0;$i<count($events);$i++) : ?>
			<?php if($i%2==0): ?>
				<div class="box">
					<h3><?php echo $events[$i]['event_title']; ?></h3>
					<p class="text">
						<?php echo nl2br($events[$i]['event_desc']); ?>
					</p>
				</div>
				<div class="box">
					<p><img class="scaled_photos" src="<?php echo $events[$i]['event_image']; ?>" alt="<?php echo $events[$i]['event_title']; ?>"></p>
				</div>
			<?php elseif ($i%2==1): ?>
				<div class="box">
					<p><img class="scaled_photos" src="<?php echo $events[$i]['event_image']; ?>" alt="<?php echo $events[$i]['event_title']; ?>"></p>
				</div>
				<div class="box">
					<h3><?php echo $events[$i]['event_title']; ?></h3>
					<p class="text">
						<?php echo nl2br($events[$i]['event_desc']); ?>
					</p>
				</div>
			<?php endif; ?>
		<?php endfor; ?>
	</div>

	<?php include("templates/footer.php"); ?>

</body>

</html>