<?php 
	include_once('inc/connection.php'); 
	#include_once('inc/func.php');
 ?>
 <?php #checkDetails(); 
 						$query4 = "UPDATE loggeduser SET loggedUID = 0 WHERE id = 1";
						mysqli_query($con, $query4);
 if (isset($_POST['submit'])){
			 $errors = 0;

		
			if (!isset($_POST['UserName'])||!isset($_POST['UserPassword'])) {
				$errors = 1;
			}
			if ($errors == 0) {
				# code...
				$UserName = $_POST['UserName'];
				$Password = $_POST['UserPassword'];

				$query = "SELECT * FROM USERS WHERE UserName = '{$UserName}' AND Password = '{$Password}'";

				$result_set = mysqli_query($con, $query);

				if ($result_set) {
					# code...
					if (mysqli_num_rows($result_set)==1) {
						# code...
						$query2 = "SELECT * FROM USERS WHERE UserName = '{$UserName}' AND Password = '{$Password}'";
						$res = mysqli_query($con, $query2);
						$loggedDet = mysqli_fetch_assoc($res);
						$query3 = "UPDATE loggeduser SET loggedUID = '{$loggedDet[id]}' WHERE id = 1";
						mysqli_query($con, $query3);

						
						header("Location: home.php");


					}
					else{
						$errors = 1;
					}
				}
			}
		}
		else{
			$errors=0;
		}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movie Recommender System Login</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #f5f5f5;">
	<div class="login"> 
		<form action='index.php' method="post"> 
			<fieldset> 
				<legend><h1>Log In</h1></legend>
				<!--<p class="error">Invalid User Name or Password.!</p>-->
				<?php if ($errors==1) {
					# code...
					#echo $errors;
					echo ('<p class="error">Invalid User Name or Password.!</p>');
					
				} ?>
				<p>User Name : 
				<input type="text" name="UserName" placeholder="User Name">
				</p>
				<p>Password : 
					<input type="Password" name="UserPassword" placeholder="Password">
				</p>
				<p> 
					<button type="submit" name="submit">Log In</button>
				</p>
			</fieldset>
		</form>
	</div>

</body>
</html>