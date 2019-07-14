<?php
$coun=$_REQUEST["c"];
$file = fopen("log.txt", "r") or die("Unable to open file!");
while(!feof($file)) {	// read all lines until end-of-file
	$line=fgets($file);
	//echo $line."<br/>";
	$ar =explode(":",$line);
	$p = trim($ar[0]);
	$c = trim($ar[1]);
	if ( $c== $coun )
	{
		echo $p."<br>";
	}
}

fclose($file);
?>