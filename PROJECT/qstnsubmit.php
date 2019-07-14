<?php

		//if($_COOKIE["cookie"]== "alive"){ 
		
		
$con = mysqli_connect("localhost", "root", "","stugeek");
	if(!$con){
		echo "Can't connect Database";
	}

	if (!empty($_POST)) {
		$question = $_POST['desc'];
		$answer1 = $_POST['option1'];
		$answer2 = $_POST['option2'];
		$answer = $_POST['answer'];

		if (!empty($question)) {
			if (!empty($answer1)) {
				if (!empty($answer2)) {
					if (!empty($answer)) {
						$sql = "insert into question(ques,option_one,option_two,answer) values ('$question', '$answer1','$answer2','$answer')";
						$result = mysqli_query($con,$sql);
						if ($result) {
							header ("Location:add_questions.php");
							//echo "Question added to quiz";
						} else {
							echo mysqli_error($con);
						}
					} else {
						echo "Please provide correct answer";
					}
				} else {
					echo "Please provide second option";
				}
			} else {
				echo "Please provide first option";
			}
		} else {
			echo "Please provide question";
		}

	}

	
	
	

?>