<?php  
		//if($_COOKIE["cookie"]== "alive"){ 
		session_start();
		if($_SESSION["match"]== "admin")
		{ 
			//echo '<a href="signout.php"> <h3 style="color:red;text-align:right;"> Sign Out </h3>  </a>';
?>
<script type="text/javascript">
	function showQuestion() {
		document.getElementById('tf').style.display = "block";
		document.getElementById('mc').style.display = "none";
	}
	
	function showMC() {
		document.getElementById('tf').style.display = "none";
		document.getElementById('mc').style.display = "block";
	}
	
</script>

<head>
		<title>Stugeek</title>
		
		<a href="admin.php"> <h3 style="color:green;"> Admin Panel </h3>  </a>
		<link href="assets/css/style.css" rel="stylesheet">
	</head>
<title>Create a queation</title>
<body>

	<section id="header">
			<div class="container">	
				<div class="logo">
					<a href="#"><img src="assets/images/logo.png" alt="logo-img"></a>
				</div>
				
				<div class="menu">
					<ul>
						<li><a href="admin1.php">Profile</a></li>
						<li><a href="signout.php">Sign Out</a></li>	
					</ul>
				</div>
			</div>	
	</section>
	<div style="width:700px;text-align:center;">
		<h2>What type of question would you like to create?</h2>
		<button onclick="showQuestion()" >True/False</button>&nbsp;&nbsp;
		<button onclick="showMC()" >Multiple Choice</button>&nbsp;&nbsp;
	</div>
	<?php
	$AresQ="";$AresV1="";$AresV2="";$AresA="";
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
	
		$s1="select * from question";
		$jsn1=getJSONFromDB($s1);
		//echo $jsn;
		$jr1=json_decode($jsn1);
		echo '<table border="2.5px" style=\"text-align:right;float:right;margin-center:10px;width:300px;\">';
		echo "<th>Question</th><th>Value1</th><th>Value2</th><th>Answer</th>";
		foreach($jr1 as $v1)
		{
			echo '<tr align="right">';
			echo '<td align="right">'.$v1->ques.'</td><td>'.$v1->option_one."</td><td>".$v1->option_two."</td><td>".$v1->answer."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		?>
	<div class="content" id="tf" style="display: none;">
		<h3>True or False</h3>
		<form action="qstnsubmit.php" name="addtfquestions" method="post">
			<h4>Type your question here</h4>
			</br>
				<textarea id="tfdesc" name="desc" style="width:400px;height:95px;"></textarea>
			</br>
			<h4>Select whether true or false is the correct answer</h4>
				<input type="text" id="answer1" name="option1" value="True" readonly>&nbsp;
				<label style="cursor:pointer; color:#06F;">
			</br>
			</br>
				<input type="text" id="answer2" name="option2" value="False" readonly>&nbsp;
				<label style="cursor:pointer; color:#06F;">
			</br>
			</br>
				<select name="answer">
					<option value="0">-Select an Answer-</option>
					<option value="True">True</option>
					<option value="False">False</option>
				</select>
				<label style="cursor:pointer; color:#06F;">
			</br>
			</br>
				<input type="hidden" name="type" value="tf">
				<input type="submit" value="Add to quiz" name="tfquiz">
			
		</form>
	</div>
	
	
	<div class="content" id="mc" style="display: none;">
		<h3>Multiple Choice</h3>
		<form action="qstnsubmit.php" name="addmcquestions" method="post">
			<h4>Type your question here</h4>
			</br>
				<textarea id="mcdesc" name="desc" style="width:400px;height:95px;"></textarea>
			</br>
			<h4>Create the fist answer of the question</h4>
				<input type="text" id="answer1" name="answer1">&nbsp;
				<label style="cursor:pointer; color:#06F;">
				<input type="radio" name="iscorrect" value="answer1">Correct Answer?</label>
			</br>
			</br>
			<h4>Create the second answer of the question</h4>
				<input type="text" id="answer2" name="answer2">&nbsp;
				<label style="cursor:pointer; color:#06F;">
				<input type="radio" name="iscorrect" value="answer2">Correct Answer?</label>
			</br>
			</br>
			<h4>Create the third answer of the question</h4>
				<input type="text" id="answer3" name="answer3">&nbsp;
				<label style="cursor:pointer; color:#06F;">
				<input type="radio" name="iscorrect" value="answer3">Correct Answer?</label>
			</br>
			</br>
			<h4>Create the fourth answer of the question</h4>
				<input type="text" id="answer4" name="answer4">&nbsp;
				<label style="cursor:pointer; color:#06F;">
				<input type="radio" name="iscorrect" value="answer4">Correct Answer?</label>
			</br>
			</br>
				<input type="hidden" name="type" value="mc">
				<input type="submit" value="Add to quiz" name="quiz">
			
		</form>
		

		

	</div>
	


</body>
<?php
			}
		else {
			header('Location: login.html');
		}
?>