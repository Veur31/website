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
	<title>Registered users page - Website ni Fetesio </title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	
</head>
<body>
	<?php include('header.php');?>
    <?php include('nav_adminpage.php');?>
    <?php include('info-col.php');?>
	<h2 class ="registered_users">Registered users</h2>
	<div class="container">
	
		<p>
			
		<?php
			require('mysqli_connect.php');
			//fetching data
			$q = "SELECT user_id,fname, lname, email, DATE_FORMAT(registration_date, '%M %d, %Y') as regdate from users ORDER BY registration_date ASC";
			$result = @mysqli_query($dbcon, $q);
			if($result){
				echo '<table>
					<tr class="design_td" style="color: black">
					<td id="Name">Name</td>
					<td id="Email">Email</td>
					<td id="Date">Registration Date</td>
					<th colspan="2">Actions</th>
					</tr>';
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo '<tr>
					<td>' . $row['fname'].', '. $row['lname'].'</td>
					<td>' . $row['email']. '</td>
					<td>' . $row['regdate']. '</td>
					<th ><a class= "edit1" href="edit_user.php?id='.$row['user_id'].'"</a>Edit</th>
					<th ><a class= "edit1" href="delete_user.php?id='.$row['user_id'].'"</a>Delete</th>
					</tr>';
					
				}

				

			}else{
				echo '</table>';
				mysqli_free_result($result);
				echo '<p class="Error"> The current users could not be retrieved due to a system error. Please report this incident to the admin, ERROR CODE: 16 </p>';


			}
			mysqli_close($dbcon);
			
		
		?>
		
		
		</p>
		
		
		

		
        </div>
		

	</div>
	
	

</body>
</html>