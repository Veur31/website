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
	<title> Member page ni Fetesio </title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="design2.css">
	
</head>
<body>
	<?php include('header.php');?>
	<?php include('nav_memberspage.php');?>
    <?php include('info-col.php');?>
	<div class="d-flex justify-content-between align-items-start" >
		<div class="card2 mx-auto">
				<div class="card-body">
					<div class="center">
                <h2>Search a Movie</h2>
                <br>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"><br>

        <button class="btn btn-outline-success" type="submit" style="color:#99dad7; border-color: #99dad7">Search</button>
      </form>

					</div>
				</div>
		</div>	
	</div>
	<br><br>
	<div class="container" >
		
		<div class="card " style="width: 18rem; background-color: #2c2c2c; border: 5px solid #bfeade;
    box-shadow: 0 0 10px #bfeade, 0 0 10px #bfeade, 0 0 20px #bfeade;">
	
			<img class="card-img-top picture" src="pictures/netflix.jpg" alt="Card image cap">
			<div class="card-body mx-auto">
				<h5 class="card-title">Netflix</h5>
				
					 <br>
				<div class="center">
					<a href="#" class="btn btn-primary" style="color:black;">Click here</a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem; background-color: #2c2c2c; border: 5px solid #bfeade;
    box-shadow: 0 0 10px #bfeade, 0 0 10px #bfeade, 0 0 20px #bfeade;">
			<img class="card-img-top picture" src="pictures/disney.png" alt="Card image cap">
			<div class="card-body mx-auto">
				<h5 class="card-title">Disney+</h5>
				
					 <br>
				<div class="center">
					<a href="#" class="btn btn-primary" style="color:black;">Click here</a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem; background-color: #2c2c2c;border: 5px solid #bfeade;
    box-shadow: 0 0 10px #bfeade, 0 0 10px #bfeade, 0 0 20px #bfeade;">
			<img class="card-img-top picture" src="pictures/appletv.png" alt="Card image cap">
			<div class="card-body mx-auto">
				<h5 class="card-title">Apple TV</h5>
			
					 <br>
				<div class="center">
					<a href="#" class="btn btn-primary" style="color:black;">Click here</a>
				</div>
			</div>
		</div>
	</div>	

        <?php include('footer.php');?>

	
</body>
</html>