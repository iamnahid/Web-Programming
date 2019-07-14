<?php

$uname = $_REQUEST["name"];
$pass = $_REQUEST["pass"];
$f = 0;
$file = fopen("userInfo.txt", "r") or die("Unable to open file!");
while(!feof($file)) {	// read all lines until end-of-file
	$line=fgets($file);
	echo $line."<br/>";
	$ar=explode("=",$line);
	if ($uname == trim($ar[0]) && $pass == trim($ar[1]) && trim($ar[2]))
	{
		$f=1;
		$user = trim($ar[2]);
		break;
	}
	else
	{
		$f==0;
	}
}
	if ( $f == 1 && $user == "admin" )
		{
			
			header("Location: Admin.php");
			session_start();
			$_SESSION["match"]="yes";
			
		}
	elseif ( $f == 1 && $user == "user" )
		{
			
			header("Location: user.php");
			session_start();
			$_SESSION["match"]="yes";
			
		}
	else
		{
			echo "<h1>Not matched </h1>";
			header("Location: Form.html");
		}

fclose($file);
?>