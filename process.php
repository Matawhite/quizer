<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	// Check to see if score is set
if(!isset($_SESSION['score'])){
	$_SESSION['score'] = 0;
}

if($_POST){
	$number = $_POST['number'];
	$selected_choice = $_POST['choice'];
	$next = $number+1;

//get total questions
	$query = "SELECT * FROM `questions`";
	$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;


// get the correct answer
	$query = "SELECT * FROM `choices`
			WHERE question_number = $number AND is_correct = 1";

// get the result

	$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	
// get row
	$row = $result->fetch_assoc();

//Set correct choice
	$correct_choice = $row['id'];

//compare
	if ($correct_choice == $selected_choice) {
		//anser is correct
		$_SESSION['score']++;
		
	}
	//check if last question
	if ($number == $total) {
		header("Location: final.php");
		exit();

	}else{
		header("Location: question.php?n=".$next);
	}
}
 