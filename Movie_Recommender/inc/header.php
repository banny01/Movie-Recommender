	<?php 
		include_once('inc/connection.php');
		$query = "SELECT * FROM loggeduser WHERE id = 1";
		$res1 = mysqli_query($con, $query);
		$loggedDet = mysqli_fetch_assoc($res1);
		$query2 = "SELECT Name FROM users WHERE id = $loggedDet[loggedUID]";
		$res2 = mysqli_query($con, $query2);
		$loggeduser = mysqli_fetch_assoc($res2);
		 ?>
	<div class="header">
	<div >
		
		<p class="greeting">Welcome <?php echo "$loggeduser[Name]" ?> !</p> 
		
	</div>
	<div class="srch"> 
		<form action="home.php"> 
			<input type="text" name="search" value="" id="search" placeholder="Search a Movie" style="border-radius: 10px; padding: 6px; float: left; width: 250px; margin-top: -10px; margin-left: 250px;">
			<button name="submit" type="submit" style=" border-radius: 10px; padding: 7px; margin-top: -500px; margin-left: 10px; width: 100px; cursor: pointer;">Search</button>
		</form>
	</div>
	<div>
		<ul class="logout"> 
			<li><a href="index.php">Log out</a></li> 

		</ul>

	</div>
	</div>