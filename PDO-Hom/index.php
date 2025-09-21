<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
</head>

<body>

  <?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <p class="message"><?=  $message ?></p>
    <?php unset($_SESSION["message"]); ?>
  <?php endif; ?>
  
  <form action="controllers/userInput.php" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <button>Submit</button>
  </form>

</body>

</html>