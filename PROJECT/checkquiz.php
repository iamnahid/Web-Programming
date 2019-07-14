<?php
	session_start();
	if($_SESSION["match"] == "yes"){
?>
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
						<li><a href="profile.php">Profile</a></li>
						<li><a href="signout.php">Sign Out</a></li>
						
					</ul>
				</div>
			</div>	
		</section>
	
	<?php 
	$count = 0;
	$daRes = array();  // Database 
	$daAns = array(); //User Defined
	
	$con = mysqli_connect("localhost", "root", "","stugeek");
		if(!$con){
			echo "Can't connect Database";
		}
		$sql = "SELECT * FROM question";
		$res = mysqli_query($con,$sql);
		$arr=array();
		//$ans=array();
		while($row = mysqli_fetch_assoc($res)) {
			$arr[]=$row;
			$daRes[] = $row["answer"];
			
		}
		if(isset($_POST["ans"])){
			foreach($_POST["ans"] as $a)
			{
				//echo $a;
				$daAns[] = $a;
			}
		}
		//$res = array_intersect($daAns, $daRes);
		//print_r($res);
		for($i=0;$i<sizeof($daRes);$i++)
		{
			//echo $daAns[$i]."  data".$daRes[$i]."</br></br>";
			
			
				if ( $daAns[$i] === $daRes[$i])
					{
						$count++;
					}
				else
					{
						$count = $count+0;
					}
			
		//echo $count;
		}
		
		echo '<h2 style="color:green">Congratulations you got: "'.$count.'" points</h2></br></br>';
		echo '<a href="performquiz.php"> <h4 style="color:red;text-align:left;">Back to New Quiz </h4>  </a>';
	//Inserting the point into database	
	function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","stugeek");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
		//echo $row["name"];echo $row["id"];echo "<br>";
	}
	return json_encode($arr);
	}
	function updateSQL($sql){
		$conn = mysqli_connect("localhost", "root", "","stugeek");
		//echo $sql;
		$result = mysqli_query($conn, $sql)or die(mysqli_error());
		return $result;
	}

		
		
	?>

	<?php
	}
	else {
			header('Location: login.html');
	}
	
	?>