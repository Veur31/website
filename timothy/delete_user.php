<?php 
	session_start();
	if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1) ){
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<title> Deleting User</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	
</head>
<body>
	
	<?php include('header.php');?>
	<?php include('nav_adminpage.php');?>
	<?php include('info-col.php');?>
	<br><br>
   
	
	<div class="container">
		<div id="content">	
		<h2 style="padding-right: 100px; font-size: 40px; font-family: Arial, Helvetica, sans-serif; color: #a0dbca;" >Deleting Records</h2>
		<div id="boxes">
			
			<div id="boxes1">
				<br>
	
		
		<br><br>
		<?php
			if((isset($_GET['id']))&& (is_numeric($_GET['id']))){
				$id =$_GET['id'];
			}elseif((isset($_POST['id']))&& (is_numeric($_POST['id']))){
				$id =$_POST['id'];
			}else{
				echo '<p class = ""error"> this page hs been accessed by mistake.</p>';
				include('footer.php');
				exit();
			}
			require('mysqli_connect.php');
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if($_POST['sure'] == 'Yes'){
					$q = "DELETE FROM users WHERE user_id = $id";
					$result = @mysqli_query($dbcon, $q);
					if(mysqli_affected_rows($dbcon) == 1){
						echo '<h3 style=" color: #a0dbca;">The record has been deleted  <br> <br> To go back Click, 
					<a  class= "edit1" href="register-view-users.php">Here.</a></h3> ';

					}else{
						echo '<h3>The user was not deleted. </h3>';
					}

				}else{
					echo '<h3 style=" color: #a0dbca;">The user was not deleted. <br> <br> To go back to <br> Registered Users <br> Click, 
					<a  class= "edit1" href="register-view-users.php">Here.</a></h3>';
					
					
				}
			}else{
				$q = "SELECT CONCAT(fname, ' ', lname) from users where user_id = $id";
				$result =@mysqli_query($dbcon, $q);
				if(mysqli_affected_rows($dbcon) == 1){

					$row = mysqli_fetch_array($result, MYSQLI_NUM);
						echo "<h4>Are you sure you want to permanently delete $row[0]?</h4>";
						echo '
						<form action = "delete_user.php" method = "post">
						<input style= "padding-left: 230px;  background-color: #565252;" id="submit-yes" type = "submit" name = "sure" value="Yes">
						<input id= "submit-no" type = "submit" name = "sure" value="No" style="background-color: #565252;">
						<input type = "hidden" name = "id" value="'.$id.'">
						</form>
						';
					
				}else{
					echo 'user not found.';
				}
			}
			mysqli_close($dbcon);
		?>
		</div>
        </div>
		</div>
		</div>
        <?php include('footer.php');?>

	
</body>
</html>