<pre>
<?php


if (strlen($_REQUEST["firstname"])!=0 || strlen($_REQUEST["lastname"])!=0 || strlen($_REQUEST["Day"])!=0 ||strlen($_REQUEST["Month"])!=0 ||strlen($_REQUEST["Year"])!=0 || strlen($_REQUEST["gender"])!=0 ||  strlen($_REQUEST["phone"])!=0 ||  strlen($_REQUEST["email"])!=0 ||  strlen($_REQUEST["pass"])!=0 ||  strlen($_REQUEST["Confpass"])!=0 )
	{
		if((preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_REQUEST["pass"])))
			{
				if (strlen($_REQUEST["pass"])<8)
					{
						echo "<h3>*Password is less than 8 characters!</h3>";
					}
				else if ( $_REQUEST["pass"] != $_REQUEST["Confpass"] )
					{
						echo "<h3>*Passwords don't match!</h3>";
					}
				else if ($_REQUEST["firstname"] == "Nrk")
					{
						echo "<h1>Hola! ".$_REQUEST["firstname"]."</h1>";
						echo "<h5> Are you enjoying today? </h5></br>";
												
					}
				else if($_REQUEST['Year']>=2008 || $_REQUEST['Year']<=1960)
					{
						echo "<h3>The Date ". $_REQUEST['Day']."/".$_REQUEST['Month']."/".$_REQUEST['Year']." is not valid</h3>";
					}
				
				else if(!strpos($_REQUEST["email"],"@") && !strpos($_REQUEST["email"],".com"))
					{
						echo "<h3>Email ".$_REQUEST["email"] ." is not Valid</h3>";
					}
				else
					{
						echo "<h1>Welcome! Mr.".$_REQUEST["firstname"]."</h1>";
						echo "<h5> Your Details:_ </h5></br>";
						echo "<h3>First Name :  ".$_REQUEST["firstname"]."</h3>" ;
						echo "<h3>Last Name :  ".$_REQUEST["lastname"]."</h3>" ;
						echo "Date: ".$_REQUEST["Day"]."-";
						echo $_REQUEST["Month"]."-";
						echo $_REQUEST["Year"]."</br>";
						echo "<p>Gender: ".$_REQUEST["gender"]."</p>";
						echo $_REQUEST["phone"]."</br>";
						echo $_REQUEST["email"]."</br>";
						echo $_REQUEST["pass"]."</br>";
						
						
					}
				}
		else{
				echo "<h3>Your password must contain a special character</h3>";
			}
	}
								

				   

else
	{
		echo"<h2> Fields Can't be Empty! </h2>";
	}




?>