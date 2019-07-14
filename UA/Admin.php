
<?php
	session_start();
	if ($_SESSION["match"] == "yes")
	{
		echo "<h1> HI! Admin!</h1>";}
	
	
	else
	{
		header("Location: Form.html");
	}
	
	
	?>
