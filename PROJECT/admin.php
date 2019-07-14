<?php  
		//if($_COOKIE["cookie"]== "alive"){ 
		session_start();
		if($_SESSION["match"]== "admin")
		{ 
			//echo '<a href="signout.php"> <h3 style="color:red;text-align:right;"> Sign Out </h3>  </a>';
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
						<li><a href="admin1.php">Back</a></li>	
						<li><a href="add_questions.php">Add quiz Question</a></li>
						<li><a href="signout.php">Sign Out</a></li>	
					</ul>
				</div>
			</div>	
		</section>
    <form action="addSysUser.php" method="post">
	<h1 style="color:green;">Welcome to Admin Panel!</h1>
	</br></br>
	<h5 style="color:green;text-align:right;">Add user to System Level<h5/>
	<input type="text" name="Uname" value="" style="float:right;">
	<input type="submit" name="UnameB" value="Add" style="float:right;">
	<?php
		$AresF="";$AresL="";$AresE="";$AresU="";$AresP="";
		function getJSONFromDB($sql)
		{
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
		function updateSQL($sql)
		{
			$conn = mysqli_connect("localhost", "root", "","stugeek");
			//echo $sql;
			$result = mysqli_query($conn, $sql)or die(mysqli_error());
			return $result;
		}
		function clickAdd()
		{
			
		}

	?>
	
	
	<div style="text-align:left;"><label style="color:blue">Non Sys Users</label>
	<?php
	//$sss= $_POST['Add'];
	//echo $sss;
	
		$s="select * from student";
		$jsn=getJSONFromDB($s);
		//echo $jsn;
		$jr=json_decode($jsn);
		echo "<table border='2.5px'>";
		echo "<th>Fname</th><th>Lname</th><th>Uname</th><th>Email</th><th>Rank</th><th>Score</th>";
		foreach($jr as $v)
		{
			echo "<tr>";
			echo "<td>".$v->FName."</td><td>".$v->LName."</td><td>".$v->Uname."</td><td>".$v->Email."</td><td>".$v->Rank."</td><td>".$v->Score."</td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
		<div style="text-align:left;float:left"><label style="color:blue">Sys Users</label></br>
	<?php
		$s1="select * from sysuser";
		$jsn1=getJSONFromDB($s1);
		//echo $jsn;
		$jr1=json_decode($jsn1);
		echo '<table border="2.5px" style=\"text-align:center;float:left;margin-center:10px;width:300px;\">';
		echo "<th>Fname</th><th>Lname</th><th>Uname</th><th>Email</th><th>Type</th>";
		foreach($jr1 as $v1)
		{
			echo '<tr align="center">';
			echo '<td align="center">'.$v1->FName.'</td><td>'.$v1->LName."</td><td>".$v1->Uname."</td><td>".$v1->Email."</td><td>".$v1->Type."</td>";
			echo "</tr>";
		}
		echo "</table>";

		
		/*<input type="button" name="show2" id="show2" onclick="user()" value="Show"style="text-align:right;"></input>
	
	*/
	?>
	
	
	
	
</form>
</body>

<?php
			}
		else {
			header('Location: login.html');
		}
?>


