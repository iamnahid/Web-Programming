<html>
	<?php 
		session_start();
		session_unset();
		setcookie("cookie", time() - 1);
		header('Location: login.html');
		exit();
	
	
	?>


</html>