<?php


$u = $_REQUEST["LUname"];
$p = $_REQUEST["LPass"];
$un1="";$p1="";$un101="";$p201="";
$v=0;

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



$Lres1 = getJSONFromDB("SELECT * FROM student WHERE Uname = '".$u."'");
$jsn1=json_decode($Lres1);
for($i=0;$i<sizeof($jsn1);$i++){
		$un1 = $jsn1[$i]->Uname;
		//echo $un1;
}

$Lres2 = getJSONFromDB("SELECT * FROM student WHERE Pass = '".$p."'");
$jsn2=json_decode($Lres2);
for($i=0;$i<sizeof($jsn2);$i++){
		$p1 = $jsn2[$i]->Pass;
		//echo $p1;
}



$Lres101 = getJSONFromDB("SELECT * FROM sysuser WHERE Uname = '".$u."'");
$jsn101=json_decode($Lres101);
for($i=0;$i<sizeof($jsn101);$i++){
		$un101 = $jsn101[$i]->Uname;
		//echo $un101;
}


$Lres201 = getJSONFromDB("SELECT * FROM sysuser WHERE Pass = '".$p."'");
$jsn201=json_decode($Lres201);
for($i=0;$i<sizeof($jsn201);$i++){
		$p201 = $jsn201[$i]->Pass;
		echo $p201;
}

if ( $un101 == $u && $p201 == $p)
	{
		session_start();
		$_SESSION["match"]="admin";
		header('Location: admin1.php');
	}
else if ( $un1 == $u && $p1 == $p)
	{
		session_start();
		$_SESSION["match"]="yes";
		header('Location: profile.php');
	}
else
	{
		
		header('Location: login.html');
		
	}	
			
?>