<?php

if(!isset($_GET["trazi"]) || empty($_GET["trazi"]))
{
   echo"Niste unijeli trazi"."<br>";
   echo "<a href='../index.php'>Natrag na glavnu stranicu</a>"."<br>";
   exit();
}
else
{
  $trazi = $_GET["trazi"];
}

require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$trazi%' OR opis LIKE '%$trazi%' ");

if($rezultat->num_rows < 1)
{
  echo "Nema rezultata"."<br>";
  echo "<a href='../index.php'>Natrag na glavnu stranicu</a>"."<br>";
  exit();
}
else
{
  $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pretraga Proizvoda</title>
</head>

<body>
  <h2>Nadeno <?= count($proizvodi); ?> proizvoda</h2>
  <?php foreach($proizvodi as $proizvod): ?>
    <h3><?= $proizvod["ime"] ?></h3>
    <p><?= $proizvod["opis"] ?></p>
    <p><?= $proizvod["cena"] ?></p>
    <a href="proizvod.php?id=<?=$proizvod['id']?>">Pogledaj proizvod</a><br>
  <?php endforeach; ?>
  <a href="../index.php">Natrag na glavnu stranicu</a>
</body>

</html>