
<?php


/*if (strlen($_REQUEST["firstname"])!=0 && strlen($_REQUEST["lastname"])!=0 &&  strlen($_REQUEST["email"])!=0 &&  strlen($_REQUEST["Pass1"])!=0 &&  strlen($_REQUEST["confpass"])!=0 )
	{
		if((preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_REQUEST["Pass1"])))
			{
				if (strlen($_REQUEST["Pass1"])<8)
					{
						echo "<h3>*Password is less than 8 characters!</h3>";
					}
				else if ( $_REQUEST["Pass1"] != $_REQUEST["confpass"] )
					{
						echo "<h3>*Passwords don't match!</h3>";
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
						echo $_REQUEST["Pass1"]."</br>";
						
						
					}
				}
		else{
				echo "<h3>Your password must contain a special character</h3>";
			}
	}
								
else if ($_REQUEST["firstname"] == "Nrk")
	{
		echo "<h1>Hola! ".$_REQUEST["firstname"]."</h1>";
		echo "<h5> Are you enjoying today? </h5></br>";
		echo $_REQUEST["Pass1"]."</br>";
		echo $_REQUEST["confpass"]."</br>";
										
	}
				   

else
	{
		echo"<h2> Fields Can't be Empty! </h2>";
	}*/
	
	

if ( $_REQUEST["Pass1"] == $_REQUEST["confpass"] )
	{
						
		$rU = $_REQUEST["un"];
		$rP = $_REQUEST["Pass1"];
		$rF = $_REQUEST["firstname"];
		$rL = $_REQUEST["lastname"];
		$rE = $_REQUEST["email"];
		//$rR = 0;
		//$rS = 0;

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

		if ( strlen($rU)!=0 && strlen($rF)!=0 && strlen($rL)!=0 && strlen($rP)!=0 && strlen($rE)!=0)
		{
			$Isql = getJSONFromDB("insert into student values('".$rF."', '".$rL."', '".$rE."', '".$rP."', '".$rU."', '000' , '000'); ");
			echo '<h1 style="color:green">Update Successful!</h1>';
			echo '<a href="login.html"> <h3 style="color:blue;"> Go to Sign In Page </h3>  </a>';
		}
		else{
			echo '<h1 style="color:red">Error!</h1>';
			echo '<a href="form.php"> <h3 style="color:blue;"> Back to Registration Page </h3>  </a>';
		}
	}
else
{
	echo "Passwords dont match";
	echo '</br></br><a href="form.php">Back to Registration Form</a>';
}
?>