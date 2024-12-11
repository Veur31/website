
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
    <?php include('nav.php');?>
    <?php include('info-col.php');?>
    <br><br>
	<div class="container">
   
	<div id="boxes">
    <form action="" method="">
					<p class="boxes1">
						<label for="">Enter your concern</label>
						<input type="text">
						
					</p>
					<p class="boxes1">
						<label class="label" for="fname">Enter your Fullname</label>
						<input type="text" id="fname" name="fname" size="30" maxlength="40" 
						value="<?php if(isset($_POST['fname'])) echo$_POST['fname'];?>">
					</p>

					<p class="boxes1">
						<label class="label" for="lname">Enter your Email Address</label>
						<input type="text" id="lname" name="lname" size="30" maxlength="40" 
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