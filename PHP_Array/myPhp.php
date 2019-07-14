<pre>
<?php


if (strlen($_REQUEST["firstname"])==0 || strlen($_REQUEST["lastname"])==0 || strlen($_REQUEST["Day"])==0 ||strlen($_REQUEST["Month"])==0 ||strlen($_REQUEST["Year"])==0 || strlen($_REQUEST["gender"])==0 ||  strlen($_REQUEST["phone"])==0 ||  strlen($_REQUEST["email"])==0 ||  strlen($_REQUEST["pass"])==0 ||  strlen($_REQUEST["Confpass"])==0 )
{
	echo "<h3>*Field can't be empty!</h3>";
}

else if (strlen($_REQUEST["pass"])<8)
{
	echo "<h3>*Password is less than 8 characters!</h3>";
}

else if ( $_REQUEST["pass"] != $_REQUEST["Confpass"] )
{
	echo "<h3>*Passwords don't match!</h3>";
}

else if ( $_REQUEST["Day"] > 5 || $_REQUEST["Year"] > 1995 || $_REQUEST["Year"] < 1991  )
{
	echo "<h3>*Invalid Dates!</h3>";
}


else if ($_REQUEST["firstname"] == "Nrk")
{
	echo "<h3>First Name:".$_REQUEST["firstname"]."</h3>" ;
	echo "<h3>Last Name:".$_REQUEST["lastname"]."</h3>" ;
	echo $_REQUEST["Day"];
	echo $_REQUEST["Month"];
	echo $_REQUEST["Year"];
	echo "<p>Gender: ".$_REQUEST["gender"]."</p>";
	echo $_REQUEST["phone"];
	echo $_REQUEST["email"];
	echo $_REQUEST["pass"];
	echo $_REQUEST["Confpass"];
	
}
else 
{
	if (strlen($_REQUEST["firstname"])!=0)
{
	echo "<h1>Hello!  ".$_REQUEST["firstname"].", you have been registered</h1>";
}
	
}

?>