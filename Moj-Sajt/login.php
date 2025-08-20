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
  <title>Login</title>
</head>

<body>
  
   <?php if(isset($_SESSION['ulogovan'])): ?>
    <h3>Dobrodosao nazad <?=$_SESSION['user_id']?></h3>
    <a href="logout.php">Logout</a>
    <a href="index.php">Glavna stranica</a>
   <?php else: ?>
    <h3>Login</h3>
  <form action="modeli/loginUser.php" method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="lozinka" placeholder="Lozinka">
    <button>Login</button>
  </form>
  <a href="registracija.php">Registracija</a>
   <?php endif; ?> 
  
</body>

</html>