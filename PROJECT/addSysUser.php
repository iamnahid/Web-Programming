<?php

$AresF="";$AresL="";$Un="";$AresE="";$AresP="";$AresU="";

$Un= $_POST["Uname"];

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

if (!empty($Un)) {
	//$addV= $_REQUEST['Add'];
	$Aadd = getJSONFromDB("SELECT * FROM student WHERE Uname = '".$Un."'");
	$jsnAdd=json_decode($Aadd);
	//echo $jsnAdd;
	for($i=0;$i<sizeof($jsnAdd);$i++){
			$AresF = $jsnAdd[$i]->FName;
			$AresL = $jsnAdd[$i]->LName;
			$AresE = $jsnAdd[$i]->Email;
			$AresU = $jsnAdd[$i]->Uname;
			$AresP = $jsnAdd[$i]->Pass;
			
	}
	if ( strlen($AresU)!=0 && strlen($AresF)!=0 && strlen($AresL)!=0 && strlen($AresE)!=0)
	{
		$Asql = getJSONFromDB("insert into sysuser values('".$AresF."', '".$AresL."', '".$AresE."', '".$AresP."', 'Admin', '".$AresU."'); ");
		echo "Successful";
		header("Location: admin.php");
		//echo '<h1 style="color:green">Update Successful!</h1>';
		//echo '<a href="login.html"> <h3 style="color:blue;"> Go to Sign In Page </h3>  </a>';
	}
	else{
		echo '<h1 style="color:red">Error!</h1>';
		//echo '<a href="form.html"> <h3 style="color:blue;"> Back to Registration Page </h3>  </a>';
	}
	
}
else{
	echo '<h1 style="color:red">Error!</h1>';
}

?>
