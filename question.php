<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
  //Set Question number
  $number = (int) $_GET['n'];

  //get question
  // its important to note that the ` symbol and not sigle quotes for the query
  //that messed me up
  $query = "SELECT * FROM `questions`
              WHERE question_number = $number";
  //get result
  $result = $mysqli->query($query) or die($mysqli->error._LINE_);

  $question = $result->fetch_assoc();

  //get choices
  $query = "SELECT * FROM `choices`
              WHERE question_number = $number";
  //get result
  $choices = $mysqli->query($query) or die($mysqli->error._LINE_);

  $query = "SELECT * FROM `questions`";
  $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
  $total = $results->num_rows
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
      <h1>Quizzer</h1>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
      <p class="question">
        <!-- This part displays the question-->
        <!-- Its important to add the text array to grab the text from the database -->
        <?php echo $question['text']; ?>
      </p>
      <form method="post" action="process.php">
        <ul class="choices">
          <!-- This part displays the choices-->

          <?php while($row = $choices->fetch_assoc()): ?>
          <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
          <?php endwhile; ?>
          
          </ul>
        <input type="submit" value="Submit" />
        <!--Hidden Submit -->
        <input type="hidden" name="number" value="<?php echo $number; ?>" />
      </form>
    </div>
  </main>
  <footer>
    <div class="container">
      Copyright &copy; 2015, Matt White
    </div>
  </footer>
</body>
</html>