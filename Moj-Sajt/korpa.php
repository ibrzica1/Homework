<?php

require_once "modeli/baza.php";

if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

if(!isset($_SESSION['ulogovan']))
{
  die("Morate biti ulogovani da bi vidjeli ovu stranicu");
}

$user_id = $_SESSION['user_id'];

$rezultat = $baza->query("SELECT 
        narudzbine.cena,
        narudzbine.kolicina,
        proizvodi.ime AS proizvod_ime
    FROM narudzbine
    INNER JOIN proizvodi ON proizvodi.id = narudzbine.id_proizvoda
    WHERE narudzbine.id_korisnika = '$user_id' ");
$narudzbe = $rezultat->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Korpa</title>
</head>

<body>

  <a href="index.php">Glavna</a>
  <?php if(isset($_SESSION['ulogovan'])): ?>
    <a href="logout.php">Logout</a>
    <a href="korpa.php">Korpa</a>
  <?php else: ?>
    <a href="login.php">Login</a>
  <?php endif; ?>

  <?php if($rezultat->num_rows == 0): ?>
    <h3>Korpa je prazna</h3>
  <?php else: ?>
    <?php foreach($narudzbe as $narudzba): ?>
    <p>Proizvod: <?=$narudzba['proizvod_ime']?></p>
    <p>Kolicina: <?=$narudzba['kolicina']?> Cena: <?=$narudzba['cena']?></p><br>
    <?php endforeach; ?>
  <?php endif; ?>
  
</body>

</html>