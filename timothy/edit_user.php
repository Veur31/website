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
	<title> Edit User</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	
</head>
<body>
	<div id= "container">
		<?php include('header.php');?>
		<?php include('nav_adminpage.php');?>
		<?php include('info-col.php');?>
		<div id="content">
		<div style="padding-right: 190px; font-size: 40px; font-family: Arial, Helvetica, sans-serif;">
		<h3 style="font-size: 50px; color: #a0dbca;"><br>Edit Section <br></h3>
		<h3 style="color: #a0dbca;">To go back to <br>Registered users, <br> Click
		<a  class= "edit1" href="register-view-users.php">Here.</a></h3> 
		</div>
			<div id= "boxes">
				<?php 
					if((isset($_GET['id']))&& (is_numeric($_GET['id']))){
						$id =$_GET['id'];
					}elseif((isset($_POST['id']))&& (is_numeric($_POST['id']))){
						$id =$_POST['id'];
					}else{
						echo '<p class = "error" style = "font-size:20px;">  <br> <br> <br> <br>this page hs been accessed by mistake.</p>';
						include('footer.php');
						exit();
					}
					require('mysqli_connect.php');
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$errors = array();
						if(empty($_POST['fname'])){
							$errors[] = "Please input your first name.";
						}else{
							$fn = trim($_POST['fname']);
						}
						if(empty($_POST['lname'])){
							$errors[] = "Please input your last name.";
						}else{
							$ln = trim($_POST['lname']);
						}
						if(empty($_POST['email'])){
							$errors[] = "Please input your email.";
						}else{
							$e = trim($_POST['email']);
						}
						if (empty($errors)){
							$q = "UPDATE users SET fname ='$fn', lname = '$ln', email = '$e' WHERE user_id ='$id' LIMIT 1"; 
							$result = @mysqli_query($dbcon, $q);
							if(mysqli_affected_rows($dbcon) == 1 ){
								
								echo '<h3  style="color: #a0dbca;"> <br><br><br>The edit was successful</h3>';
								echo '<h2 id="registration"  style="color: #a0dbca;">Congratulations!</h2>';
							}else{
								echo '<h3  style="color: #a0dbca;"> <br><br><br>The edit was not Successful.</h3>';
								echo '<h2 id="registration"  style="color: #a0dbca;">Try again</h2>';
								echo '<p>'.mysqli_error($dbcon).'</p>';
							}
						}else{
							//display ang laman ng $errors
							echo '<h2 class ="edesign">Error</h2>
							<p> <br>The following error(s) hs occured: <br/>';
							foreach($errors as $msg){
								echo " - $msg<br/>\n";
							}
						}

					}
					$q = "SELECT fname, lname, email from users where user_id='$id'";
					$result = @mysqli_query($dbcon, $q);
					if (mysqli_num_rows($result)==1){ 
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						echo'
					
							<form action="edit_user.php" method="post">

							<p class="boxes1">
								<label class="label" for="fname" style="color: #a0dbca;">First name</label>
								<input type="text" id="fname" name="fname" size="30" maxlength="40" 
								value="'.$row['fname'].'">
							</p>

							<p class="boxes1">
								<label class="label" for="lname"  style="color: #a0dbca;">Last name</label>
								<input type="text" id="lname" name="lname" size="30" maxlength="40" 
								value="'.$row['lname'].'">
							</p>

							<p class="boxes1">
								<label class="label" for="email"  style="color: #a0dbca;">Email Address</label>
								<input type="text" id="email" name="email" size="30" maxlength="50" 
								value="'.$row['email'].'">

							<p id="submit1">
							<input type="submit" id="submit" name="submit" value="Edit">
							</p>

							<p><input type = "hidden" name="id" value="'.$id.'">
							</p>

							</form>
						';

					}else{//not valid id
						echo '<h2>The user is not in the database.</h2>';
						echo '<p>Please register here. Click <a href="register.php">Here</a></p>';
					}
					mysqli_close($dbcon);
				?>
				</div>
			</div>
		</div>
        <?php include('footer.php');?>
	</div>
	
</body>
</html>