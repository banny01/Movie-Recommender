<?php include_once('inc/connection.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movie Recommender - Home</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript"> 
		alert("Click on a movie for better recommendation.")
	</script>


</head>
<body>

	<?php include("inc/header.php"); ?>
	<!--<h4>Click on a movie for better recommendation.</h4>-->
	<div > 

		<div class="allm" > 
			<h3 class="all">All Movies</h3>
			<div class="table">

			<table class="alltab" id="alltab"> 
				<thead>
                <tr>
                    <th>ID</th>
                    <th>Movie</th>
                    
                </tr>
                
            </thead>
            <tbody>
                <?php
                    if (($csvfile = fopen("inc/Movie_Id_Titles.csv", "r")) !== FALSE) {
                        while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
                            $error='';
                            $colcount = count($csvdata);
                            echo '<tr>';
                            if($colcount!=2) {
                                $error = 'Column count incorrect';
                            } else {
                                //check data types
                                if(!is_numeric($csvdata[0])) $error.='error';
                                
                            }
                            if (isset($_POST['submit'])) {
                            	# code...
                            
                            if(!isset($_POST['search'])){
                            switch($error) {
                                case "Column count incorrect":
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    
                                    break;
                                case "error":
                                    echo '<td class="error">'.$csvdata[0].'</td>';
                                    echo '<td class="error">'.$csvdata[1].'</td>';
                                    
                                default:
                                    echo '<td>'.$csvdata[0].'</td>';
                                    echo '<td>'.$csvdata[1].'</td>';
                            }
                        }
                    	else {
                    		
                    	}

                    }
                    else{
                    	switch($error) {
                                case "Column count incorrect":
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    
                                    break;
                                case "error":
                                    echo '<td class="error">'.$csvdata[0].'</td>';
                                    echo '<td class="error">'.$csvdata[1].'</td>';
                                    
                                default:
                                    echo '<td>'.$csvdata[0].'</td>';
                                    echo '<td>'.$csvdata[1].'</td>';
                            }
                    }
                                    
                            echo '</tr>';
                        }
                        fclose($csvfile);
                    }
                ?>
            </tbody>
			</table>
			</div>
		</div>

		<script>

			let table = document.getElementById('alltab').getElementsByTagName('tbody')[0];
			for (let i = 0; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                        TableRowClick(this);
                    };
                }                       
	
            function TableRowClick(therow) {
                let msg = therow.cells[1].innerHTML;
                //document.writeln(msg);
                //return msg;
                $.ajax({
                	url : 'inc/connection.php',
                	method : 'post',
                	data : {msg : msg},
                	success : function(response){
                		console.log(response);
                		window.open('https://www.imdb.com/find?q='+msg);
                	}
                });
            };

		</script> 

		<?php/*
		$selectMovie = ""; 
		$query1 = "UPDATE selectone SET movie = '{$selectMovie}' WHERE id = 1";
						mysqli_query($con, $query1);*/

		?>

		<div class="recm" > 
			<h3 class="rec">Recommended For You</h3>
			<div class="table">

			<table class="rectab" id="rectab" style="background-color: #f5f5f5;"> 
				<thead>
                <tr>
                    
                    <th>Movie</th>
                    
                </tr>
                
            </thead>
            <tbody>
                <?php
                    $query = "SELECT loggedUID FROM loggeduser";
					$res = mysqli_query($con, $query);
					$loggedUID = mysqli_fetch_assoc($res);

					$query2 = "SELECT movieName FROM recmovies WHERE uid = '{$loggedUID['loggedUID']}' ORDER BY id DESC";
					$result = mysqli_query($con, $query2);

					/*$page = $_GET['page'];
					echo $page;

					if ($page = "" || $page = "1") {
						# code...
						$p = 0;
					}
					else{
						$p = ($page*20)-20;
					}

					$query3 = "SELECT movieName FROM recmovies WHERE uid = '{$loggedUID['loggedUID']}' LIMIT 0,20 ORDER BY id DESC ";
					$result2 = mysqli_query($con, $query3);*/

					$number_of_results = mysqli_num_rows($result);

					while ($row = mysqli_fetch_assoc($result)) {
					# code...
						$dat = str_replace('>', '\'', $row['movieName']);
					
                ?>
                <tr> 
                	<td><?php echo $dat ; ?></td>
                </tr>
            <?php } 
            	/*$pages = ceil($number_of_results/20);
            	for ($i=1; $i<=$pages  ; $i++) { 
            		# code...
            		?><a href="home.php?User=<?php echo "$_GET[User]"; ?> &page=<?php echo "$i"; ?>" style="text-decoration: none;"><?php echo $i." "; ?></a><?php 
            	}*/
            ?>
            </tbody>
			</table>
			<!--<link rel="stylesheet" href="css/bootstrap.css"/>
			<script src="js/jquery-3.3.1.js"></script>
			<script src="js/jquery.dataTables.js"></script>
			<script src="js/dataTables.bootstrap.js"></script>
			<script type="text/javascript"> 
				$(".rectab").DataTable();
			</script>-->
			</div>
		</div>
		<script>

			let table2 = document.getElementById('rectab').getElementsByTagName('tbody')[0];
			for (let i = 0; i < table2.rows.length; i++)
                {
                    table2.rows[i].onclick = function()
                    {
                        TableRowClick2(this);
                    };
                }                       
	
            function TableRowClick2(therow) {
                let msg2 = therow.cells[0].innerHTML;
                //document.writeln(msg);
                //return msg;
                $.ajax({
                	url : 'inc/connection.php',
                	method : 'post',
                	data : {msg : msg2},
                	success : function(response){
                		console.log(response);
                	}
                });
            };

		</script> 
	</div>
	

</body>
</html>