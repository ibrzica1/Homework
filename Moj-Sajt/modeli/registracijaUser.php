<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(!isset($_POST["ime"]) || empty($_POST["ime"]))
{
  echo("Niste unijeli polje ime"."<br>");
  echo("<a href='../registracija.php'>Nazad na registraciju</a>");
  exit();
}
else
{
  $ime = $_POST["ime"];
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  echo("Niste unijeli polje email"."<br>");
  echo("<a href='../registracija.php'>Nazad na registraciju</a>");
  exit();
}
else
{
  $email = $_POST["email"];
}

if(!isset($_POST["lozinka"]) || empty($_POST["lozinka"]))
{
  echo("Niste unijeli polje lozinka"."<br>");
  echo("<a href='../registracija.php'>Nazad na registraciju</a>");
  exit();
}
else
{
  $lozinka = $_POST["lozinka"];
}

if(!isset($_POST["ponovljenaLozinka"]) || empty($_POST["ponovljenaLozinka"]))
{
  echo("Niste ponovno unijeli lozinku"."<br>");
  echo("<a href='../registracija.php'>Nazad na registraciju</a>");
  exit();
}
else
{
  $ponovljenaLozinka = $_POST["ponovljenaLozinka"];
}

require_once("baza.php");

$imeUspjesnaRegistracija = false;
$emailUspjesnaRegistracija = false;
$lozinkaUspjesnaRegistracija = false;


$rezultatIme = $baza->query("SELECT * FROM user WHERE ime = '$ime' ");

if($rezultatIme->num_rows > 0)
{
  echo "Ime vec postoji u bazi"."<br>";
  $imeUspjesnaRegistracija = false;
}
else
{
  $imeUspjesnaRegistracija = true;

  $rezultatEmail = $baza->query("SELECT * FROM user WHERE email = '$email' ");

  if($rezultatEmail->num_rows > 0)
  {
    echo "Email vec postoji u bazi"."<br>";
    $emailUspjesnaRegistracija = false;
  }
  else
  {
    $emailUspjesnaRegistracija = true;


    if($lozinka != $ponovljenaLozinka)
    {
      echo "Lozinka i ponovljena lozinka nisu iste"."<br>";
      $lozinkaUspjesnaRegistracija = false;
    }
    else
    {
      $lozinkaUspjesnaRegistracija = true;
      $lozinka = password_hash($lozinka, PASSWORD_BCRYPT);

      $baza->query("INSERT INTO user(ime,email,lozinka)
      VALUES ('$ime','$email','$lozinka') ");
      $_SESSION['ime'] = $ime;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registracija</title>
</head>

<body>
  <?php if($imeUspjesnaRegistracija && $lozinkaUspjesnaRegistracija && $emailUspjesnaRegistracija): ?>
    <h2>Uspjesno registriran</h2>
    <a href="../index.php">Na glavnu stranicu</a>
  <?php else: ?>
    <a href="../registracija.php">Nazad na registraciju</a>
  <?php endif; ?>
</body>

</html>