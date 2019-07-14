<!DOCTYPE html>
<?php  
		//if($_COOKIE["cookie"]== "alive"){ 
		session_start();
		if($_SESSION["match"] == "yes"){ 
			//echo '<a href="signout.php"> <h3 style="color:red;text-align:right;"> Sign Out </h3>  </a>';
		?>
<html lang="en">
	<head>
		<title>Stugeek</title>
		
		
		<link href="assets/css/style.css" rel="stylesheet">
	</head>
	<body>
		<section id="header">
			<div class="container">	
				<div class="logo">
					<a href="#"><img src="assets/images/logo.png" alt="logo-img"></a>
				</div>
				
				<div class="menu">
					<ul>
						<li><a href="performquiz.php">Start Quiz</a></li>
						<li><a href="signout.php">Sign Out</a></li>
						
					</ul>
				</div>
			</div>	
		</section>
		
		<section id="cover">
			<div class="container">
				<div class="cover-content">
					<div class="name">
						
					</div>
				</div>
			</div>
		</section>
		
		<section id="about">
			<div class="container">
				<div class="section-padding">
					<div class="about-top">
						<div class="about-left">
							<h4>Studies at</h4><a href="www.aiub.edu"><h4>American International University-Banglaesh</h4></a>
							<h4>Studied at</h4><a href="#"><h4>Cambrian College</h4></a>
							<h4>Lives in</h4><a href="#"><h4>Dhaka,Bangladesh</h4></a>	
						</div>
						
						<div class="about-right">
							<img src="assets/images/p1.jpg" alt="img">
						</div>
					</div>
					
					<div class="about-bottom">
						<div class="counter-content">
							<span class="content">Ranking</span>
							<span class="content">100</span>
							<span class="content">out of</span>
							<span class="content">2,50,000</span>
							<span class="content">students</span>
							
						</div>
					</div>
				</div>
			</div>
		</section>







	</body>
	
</html>
<?php
		}
		else {
			header('Location: login.html');
		}
	
	
?>