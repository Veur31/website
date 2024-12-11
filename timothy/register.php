<!doctype html>
<html lang="en">
<head>
	<title> Website ni Fetesio </title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel ="stylesheet" type="text/css" href="design2.css">
	
</head>
<body>
	<div id="container">
	<?php include('header.php');?>
	<?php include('nav.php');?>
	<?php include('info-col.php');?>
	
		<div id="content">
		
		<div id="boxes">
			<?php
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//error array to store all errors
						$errors = array();
						//may nilagay ba na first name?
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


						if(!empty($_POST['psword1'])){
							if($_POST['psword1'] != $_POST['psword2']){
								$errors[] = 'Your password do not match';

							}else{
								$p=trim($_POST['psword1']);
							}
						}else{
							$errors[] = "Please input your password.";
						}
						if (empty($errors)){
							require('mysqli_connect.php');
							$encrypt = hash('sha256',$p);
							//querry para ipasok yung data
							$q="insert into users(fname, lname, email, psword, registration_date) values ('$fn', '$ln', '$e', '$encrypt', NOW())";
							$result = @mysqli_query($dbcon, $q);
							if($result) { //kung ok result
								header("location: register_success.php");
								exit();
							}else{ //kung mali
								//display error
								echo'<h2>System Error</h2>
								<p class=error>Your registration failed due to unexpected error. Sorry for the inconvenience.</p>';
								//for debugging
								echo'<p>'.mysqli_error($dbcon).'</p>';
							}
							//isara ang connection ng database
							mysqli_close($dbcon);


							include('footer.php');
							exit();


						}else{
							echo '<h2 class ="edesign" style="color:#99dad7;">Error</h2>
							<p style="color:#99dad7;"> The following error(s) hs occured: <br/>';
							foreach($errors as $msg){
								echo " - $msg<br/>\n";
							}
							echo '<br/><a href="register.php" class="edesign1"><h3 class="edesign1" ><p>Please try again.</p></h3></a><br/><br/>';

						}
				}
				
			?>
			
			<h2 id="registration" style="color: #a0dbca;">Registration page</h2>
				<form action="register.php" method="post">
					<p class="boxes1">
						<label class="label" for="fname" style="color: #a0dbca;">First name</label>
						<input type="text" id="fname" name="fname" size="30" maxlength="40" 
						value="<?php if(isset($_POST['fname'])) echo$_POST['fname'];?>">
					</p>

					<p class="boxes1">
						<label class="label" for="lname" style="color: #a0dbca;">Last name</label>
						<input type="text" id="lname" name="lname" size="30" maxlength="40" 
						value="<?php if(isset($_POST['lname'])) echo$_POST['lname'];?>">
					</p>
					<p class="boxes1">
						<label class="label" for="email" style="color: #a0dbca;">Email Address</label>
						<input type="text" id="email" name="email" size="30" maxlength="50" 
						value="<?php if(isset($_POST['email'])) echo$_POST['email'];?>">
					</p>
					<p class="boxes1">
						<label class="label" for="psword1" style="color: #a0dbca;">Password</label>
						<input type="password" id="psword1" name="psword1" size="30" maxlength="20" 
						value="<?php if(isset($_POST['psword1'])) echo$_POST['psword1'];?>">
					</p>
					<p class="boxes1">
						<label class="label" for="psword2" style="color: #a0dbca;">Repeat Password</label>
						<input type="password" id="psword2" name="psword2" size="30" maxlength="20" 
						value="<?php if(isset($_POST['psword2'])) echo$_POST['psword2'];?>">
					</p>
					<br><br>
					<p id="submit1">
						<input type="submit" id="submit" name="submit" value="Register">
					</p>
				</div>
				
				
			</form>
		</div>
		<br>
		<?php include('footer.php');?>
	</div>
</body>
</html>