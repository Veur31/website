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
	<title> Admin page ni Fetesio </title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	
</head>
<body>
	<?php include('header.php');?>
    <?php include('nav_adminpage.php');?>
    <?php include('info-col.php');?>
	<div class="container">
        <img src="pictures/dash.png" alt="">
		
		
			<div class="card " style="width: 18rem; background-color: #2c2c2c; border: 5px solid #bfeade;
    box-shadow: 0 0 10px #bfeade, 0 0 10px #bfeade, 0 0 20px #bfeade;">
			<img class="card-img-top picture" src="pictures/analytics.jpg" alt="Card image cap">
			<div class="card-body mx-auto">
				<h5 class="card-title">Analytics</h5>
				
					 <br>
				<div class="center">
					<a href="#" class="btn btn-primary" style="color:black;">Click here</a>
				</div>
			</div>
		</div>
		</div>
        </div>
        <?php include('footer.php');?>
	</div>
	
</body>
</html>