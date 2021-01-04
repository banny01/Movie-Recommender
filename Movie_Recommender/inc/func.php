
<?php 
	function checkDetails(){
		if (isset($_POST['submit'])){
			$errors = array();

			if (!isset($_POST['UserName'])||!isset($_POST['UserPassword'])) {
				$errors[] = "Please Enter Login Details";
			}
			if (empty($errors)) {
				# code...
				$UserName = $_POST['UserName'];
				$Password = $_POST['UserPassword'];

				$query = "SELECT * FROM USERS WHERE UserName = '{$UserName}' AND Password = '{$Password}'";

				$result_set = mysqli_query($con, $query);

				if ($result_set) {
					# code...
					if (mysqli_num_rows($result_set)==1) {
						# code...
						header('Location: ./home.php');
					}
					else{
						$errors[] = "User Name Or Password Invalid";
					}
				}
			}
		}
	}
 ?>