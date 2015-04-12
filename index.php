<?php include 'database.php'; ?>
<?php 
//get the total number of questions
$query = "SELECT * FROM questions";

$results = $mysqli->query($query) or die($mysqli->error._LINE_);

$total = $results->num_rows;


?>

<!DOCTYPE html>
<html>
	<head>
  	<meta charset="utf-8">
  	<title>Quiz</title>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <header>
  	<div class="container">
  		<h1>Create a Quiz!</h1>
  	</div>
  </header>
  <main>
  	<div class="container">
  		<h2>Test your Knowledge</h2>
      <p>This is a multiple choice quiz to test your knowledge of things</p>
      <ul>
        <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
         <li><strong>Type:  </strong>Mulitple Choice</li>
          <li><strong>Estimated Time:  </strong><?php echo $total * .5; ?> minutes</li>
      </ul>
      <a href="question.php?n=1" class="start">Take A Quiz</a> <br> <br>
      <a href="add.php" class="start">Add a question</a>
  	</div>
  </main>
  <footer>
  	<div class="container">
  		Copyright &copy; 2015, Matt White
  	</div>
  </footer>
</body>
</html>