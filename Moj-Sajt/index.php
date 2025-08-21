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

    <?php if(isset($_SESSION['ulogovan'])): ?>
      <h3 style="margin-bottom:5px;"><?=$_SESSION['ime']?></h3>
      <a href="logout.php">Logout</a>
      <a href="korpa.php">Korpa</a>
      
      <form action="modeli/unosProizvoda.php" method="post">
      <br><input type="text" name="ime" placeholder="Ime proizvoda"><br>
      <input type="text" name="opis" placeholder="Opis proizvoda"><br>
      <input type="text" name="cena" placeholder="Cena proizvoda"><br>
      <input type="text" name="kolicina" placeholder="Kolicina proizvoda"><br>
      <button>Unesi</button>
    </form>
      <br>
    <form action="pretragaProizvoda.php" method="get">
      <input type="text" name="trazi" placeholder="Pretrazi proizvode">
      <button>Trazi</button>
    </form>
    <?php else: ?>
      <a href="login.php">Login</a>
      <form action="modeli/unosProizvoda.php" method="post">
      <br><input type="text" name="ime" placeholder="Ime proizvoda"><br>
      <input type="text" name="opis" placeholder="Opis proizvoda"><br>
      <input type="text" name="cena" placeholder="Cena proizvoda"><br>
      <input type="text" name="kolicina" placeholder="Kolicina proizvoda"><br>
      <button>Unesi</button>
    </form>
      <br>
    <form action="pretragaProizvoda.php" method="get">
      <input type="text" name="trazi" placeholder="Pretrazi proizvode">
      <button>Trazi</button>
    </form>
    <?php endif; ?>
    
</body>

</html>