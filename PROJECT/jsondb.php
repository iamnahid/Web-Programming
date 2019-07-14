<?php
/*$jsonData='[{"Name":"Nahid","Email":"nrk@com"},
{"Name":"Mona","Email":"mon@com"}]';*/


function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","stugeek");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

	$sql="select * from sysuser";
	echo "</br>";
	//echo $sql."<br/>";
	$jsonData= getJSONFromDB($sql);
	echo $jsonData;

?>