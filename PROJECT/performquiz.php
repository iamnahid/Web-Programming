<?php  
		//if($_COOKIE["cookie"]== "alive"){ 
		session_start();
		if($_SESSION["match"]== "yes")
		{ 
			//echo '<a href="signout.php"> <h3 style="color:red;text-align:right;"> Sign Out </h3>  </a>';
?>
<?php

	function dontComeBack()
	{
		header('Location: checkquiz.php');
	}
	function goBack()
	{
		header('Location: profile.php');
	}
	$counter = 1;
	$con = mysqli_connect("localhost", "root", "","stugeek");
	if(!$con){
		echo "Can't connect Database";
	}
	$sql = "SELECT * FROM question";
	$res = mysqli_query($con,$sql);
	while ($result = mysqli_fetch_assoc($res)) { ?>
	<form action="checkquiz.php" method="post" id="frm" style="border:#000 1px solid; padding: 10px 40px 40px 40px;">
		<?php global $counter;echo $counter.". ".$result['ques'];$counter++; ?>
		<select name="ans[]">
			<option value="0">Select an answer</option>
			<option value="True">True</option>
			<option value="False">False</option>
		</select><br><br>
	<?php } ?><br>
	<input type="submit" value="Submit" onclick="dontComeBack()">
	<a href="profile.php"><label style="color:red">Cancel</label></a>
	</form>
	<script type="text/javascript">
		function countDown(sec, elem){
			var element = document.getElementById(elem);
			var f = document.getElementById('frm');
			element.innerHTML = sec+" seconds left";
			if(sec < 1){
				clearTimeout(timer);
				element.innerHTML = '<h2>Your time is up</h2>'
				//element.innerHTML = '<form action="checkquiz.php" method="post"></form>'
				//window.location="checkquiz.php";
				f.submit();
			}
			sec--;
			var timer = setTimeout('countDown('+sec+',"'+elem+'")',1000)
			
		}
	</script>
	<div id="status"></div>
	<script type="text/javascript">
	countDown(10,"status");
	</script>
	
	<?php
			}
		else {
			header('Location: login.html');
		}
	?>