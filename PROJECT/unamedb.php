<?php
$jsonData='[{"id":"10","name":"test","cgpa":"9.99"},
{"id":"123","name":"xyz","cgpa":"3.90"},
{"id":"1256","name":"test2","cgpa":"2.30"}]';

function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","stugeek");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
if(isset($_REQUEST['Uname'])){
	$sql="select * from student where Uname='".$_REQUEST['Uname']."'";
	//echo $sql."<br/>";
	$jsonData= getJSONFromDB($sql);
	echo $jsonData;
}
else{
	echo "invalid parameter";
}
?>