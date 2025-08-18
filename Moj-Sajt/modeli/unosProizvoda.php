<?php

if(!isset($_POST["ime"]) || empty($_POST["ime"]))
{
  die("Niste unijeli ime");
}
else
{
  $ime = $_POST["ime"];
}
if(!isset($_POST["opis"]) || empty($_POST["opis"]))
{
  $opis = "";
}
else
{
  $opis = $_POST["opis"];
}
if(!isset($_POST["cena"]) || empty($_POST["cena"]))
{
  die("Niste unijeli cenu");
}
else
{
  $cena = $_POST["cena"];
}
if(!isset($_POST["kolicina"]) || empty($_POST["kolicina"]))
{
  die("Niste unijeli kolicinu");
}
else
{
  $kolicina = $_POST["kolicina"];
}

require_once ("baza.php");

$rezultatStari = $baza->query("SELECT * FROM proizvodi");
$stariBrojBaza = $rezultatStari->num_rows;

$insertProizvod = "INSERT INTO proizvodi(ime,opis,cena,kolicina)
VALUES ('$ime','$opis',$cena,$kolicina)";

$baza->query($insertProizvod);

$rezultatNovi = $baza->query("SELECT * FROM proizvodi");
$noviBrojBaza = $rezultatNovi->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unos proizvoda</title>
</head>

<body>
    
<?php if($noviBrojBaza > $stariBrojBaza): ?>
  <h3>Uspjesno ste unijeli proizvod</h3>
  <a href="../index.php">Natrag na stranicu</a>
<?php else: ?>
  <h3>Niste uspjeli unijeti proizvod</h3>
  <a href="../index.php">Natrag na stranicu</a>
<?php endif; ?>
</body>

</html>