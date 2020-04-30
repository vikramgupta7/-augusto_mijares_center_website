<div class="welcome">
	<?php if (isset($_COOKIE['user_name']) && $_COOKIE['typeofuser'] == 'admin') :?>
		<p style="text-align: center;">
		Welcome, <?php echo $_COOKIE['user_name']; ?>
  		<a href="templates/logout.php">(logout)</a>	
  	<?php else: ?>
  		<?php
        // $_COOKIE['user_name'] = "";
        // $_COOKIE['typeofuser'] = "";
        // header('Location:../../login.php');
        echo "<script>location.href='../login.php';</script>";
       ?>
  	<?php endif; ?>		
</div>  