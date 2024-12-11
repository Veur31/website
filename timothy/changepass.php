<?php 
	session_start();
	if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0) ){
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<title> Website ni Fetesio </title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	
</head>
<body>
	<?php include('header.php');?>
    <?php include('nav_memberspage.php');?>
    <?php include('info-col.php');?>
    <br><br>
	<div class="container">
    
	<div id="boxes">
    <form action="" method="">

					<p class="boxes1">
						<label class="label" for="fname">Enter your Password</label>
						<input type="password" id="fname" name="fname" size="30" maxlength="40" 
						value="<?php if(isset($_POST['fname'])) echo$_POST['fname'];?>">
					</p>

					<p class="boxes1">
						<label class="label" for="lname">Enter your new password</label>
						<input type="password" id="lname" name="lname" size="30" maxlength="40" 
						value="<?php if(isset($_POST['lname'])) echo$_POST['lname'];?>">
                        
					</p>
                    <p class="boxes1">
						<label class="label" for="lname">Re-enter your new password</label>
						<input type="password" id="lname" name="lname" size="30" maxlength="40" 
						value="<?php if(isset($_POST['lname'])) echo$_POST['lname'];?>">
					</p>
					<br>
					<p id="submit1">
						<input type="submit" id="submit" name="submit" value="submit">
					</p>
                    
	</div>
	</div>
    <?php include('footer.php');?>
	
</body>
</html>