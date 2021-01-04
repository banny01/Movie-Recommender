<?php 
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPassword = '10460998';
	$dbName = 'MovieRec';

	$con = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);

	if(isset($_POST['msg'])){
		$movie = $_POST['msg'];
		$movie = str_replace('\'', '>', $movie);

		$query1 = "UPDATE selectone SET movie = '{$movie}' WHERE id = 1";
						mysqli_query($con, $query1);
						//shell_exec("E:\Academic\Programming\Projects\Recommender System\dist\Main.exe");
						$command = escapeshellcmd('python3 /inc/Main.py');
						//shell_exec($command);
	}
	
 ?>