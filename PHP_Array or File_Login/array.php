<?php


$up = array('nrk'=>'123456789*','Nahidul'=>'123456789/','rony'=>'123456789-');

if ( $_REQUEST != 0 )
{
	$fn = $_REQUEST["firstname"];
	$pass1 = $_REQUEST["pass"];
	
	foreach( $up as $f => $p)
	{
		if ( $f == $fn && $p == $pass1)
		{
			
			header("Location: W.html");
			break;
		}
		else
		{
			echo "<h1>Not matched </h1>";
			header("Location: Form.html");
		}
	}
}



?>