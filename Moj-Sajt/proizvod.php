<?php

if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

if( !isset($_GET['id']) || empty($_GET['id']))
{
  echo "Fali ID proizvoda"."<br>";
  echo "<a href='../index.php'>Natrag na glavnu stranicu</a>";
  exit();
}

require_once "modeli/baza.php";

$idProizvoda = $_GET['id'];

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = $idProizvoda");

if ($rezultat->num_rows == 0)
{
  echo "Ovaj proizvod ne postoji"."<br>";
  echo "<a href='../index.php'>Natrag na glavnu stranicu</a>";
  exit();
}

$proizvod = $rezultat->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proizvod</title>
</head>

<body>
  <a href="index.php">Glavna</a>
  <?php if(isset($_SESSION['ulogovan'])): ?>
    <a href="logout.php">Logout</a>
    <a href="korpa.php">Korpa</a>
  <?php else: ?>
    <a href="login.php">Login</a>
  <?php endif; ?>

    <h1><?= $proizvod["ime"] ?></h1>
    <p><?= $proizvod["opis"] ?></p>

    <?php if($proizvod['kolicina'] == 0): ?>
        <p>Nema na stanju</p>
    <?php else: ?>
        <p>Ima na stanju</p>
    <?php endif; ?>

    <?php if(isset($_SESSION['ulogovan'])): ?>

      <form action="modeli/dodavanjeKorpa.php" method="post">
        <input type="number" name="kolicina" placeholder="Unesite kolicinu proizvoda">
        <input type="hidden" name="id_proizvoda" value="<?= $proizvod["id"] ?>">
        <button>Dodaj u korpu</button>
      </form>

    <?php else: ?>
      <a href="login.php">Kliknite da se ulogujete kako bi dodali u korpu</a><br>
    <?php endif; ?>
    
    <br><a href='index.php'>Natrag na glavnu stranicu</a>
</body>

</html>