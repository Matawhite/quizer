<?php session_start(); ?>
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
      <h2>You're Done!</h2>
      <p>Congratz! You have complete the test</p>
      <p>Final Score: <?php echo $_SESSION['score']?></p>
      <a href="question.php?n=1" class="start">Take Again</a>
      <a href="index.php" class="start">Go Home</a>
    </div>
  </main>
  <footer>
    <div class="container">
      Copyright &copy; 2015, Matt White
    </div>
  </footer>
</body>
</html>
<?php session_destroy(); ?>