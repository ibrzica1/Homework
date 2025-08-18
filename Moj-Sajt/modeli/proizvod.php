<?php

if( !isset($_GET['id']) || empty($_GET['id']))
{
  echo "Fali ID proizvoda"."<br>";
  echo "<a href='../index.php'>Natrag na glavnu stranicu</a>";
  exit();
}

require_once "baza.php";

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
    <h1><?= $proizvod["ime"] ?></h1>
    <p><?= $proizvod["opis"] ?></p>
    <a href='../index.php'>Natrag na glavnu stranicu</a>
</body>

</html>