<!doctype html>
<html lang="en">
<head>
	<title> Login User</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	
</head>
<body>
	<div id= "container">
		<?php include('header.php');?>

		<?php include('info-col.php');?>
		<br>
		<br>
		<div id="content">
		<div style="padding-right: 190px; font-size: 40px; font-family: Arial, Helvetica, sans-serif;">
		<h3 style="font-size: 50px; font-family: 'Montserrat', sans-serif; color: #a0dbca;"><br>Login<br></h3>
        <h4 style="font-size: 20px; color: #a0dbca;">Don't have an account yet? <br> Register, <a class= "edit1" href="register.php">Here</a></h4>
		</div>
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				require('mysqli_connect.php');
				if(!empty($_POST['email'])){
					$e = mysqli_real_escape_string($dbcon, $_POST['email']);
				}else{
					echo '<p class = "error">No email. </p>';

				}
				if(!empty($_POST['psword'])){
					$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
				}else{
					echo '<p class = "error">No password. </p>';
				}
				if ($e && $p){
					$encrypt = hash('sha256',$p);
					$q ="SELECT user_id, fname, user_level from users where (email = '$e' AND psword = '$encrypt')";
					$result = mysqli_query($dbcon, $q);
					if (mysqli_num_rows($result)== 1){
					session_start();
					$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['user_level'] = (int) $_SESSION['user_level'];
					$url = ($_SESSION['user_level'] === 1) ? 'admin_page.php' : 'members_page.php';
					header('Location: '. $url);
					exit();
					mysqli_free_result($result);
					mysqli_close($dbcon);
					}else{
						echo '<p class = "error">error1. </p>';
					}
				}else{
					echo '<p class = "error">error. </p>';
				}

				mysqli_close($dbcon);
			}
		?>
			<div id= "boxes">
					<form action="login.php" method="post">
						<p class="boxes1">
							<label class="label" for="email" style="color: #bfeade;">Email Address</label>
							<input type="text" id="email" name="email" size="30" maxlength="60" 
							value="<?php if(isset($_POST['email'])) echo$_POST['email'];?>">
						</p>
						<p class="boxes1">
							<label class="label" for="psword" style="color: #bfeade;">Password</label>
							<input type="password" id="psword" name="psword" size="12" maxlength="12" 
							value="<?php if(isset($_POST['psword'])) echo$_POST['psword'];?>">
                            <br>
						</p>
						<p class="boxes1">
                        <input type="submit" id="submit" name="submit" value="Login">
						</p>
						</p>
					</form>
				</div>
			</div>
		</div>
        <?php include('footer.php');?>
	</div>
	
</body>
</html>