<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  echo("Niste unijeli polje ime"."<br>");
  echo("<a href='../login.php'>Nazad na login</a>");
  exit();
}
else
{
  $email = $_POST["email"];
}

if(!isset($_POST["lozinka"]) || empty($_POST["lozinka"]))
{
  echo("Niste unijeli polje lozinka"."<br>");
  echo("<a href='../login.php'>Nazad na login</a>");
  exit();
}
else
{
  $lozinka = $_POST["lozinka"];
}

require_once "baza.php";

$rezultatKorisnik = $baza->query("SELECT * FROM user WHERE email = '$email' ");

if($rezultatKorisnik->num_rows == 0)
{
  echo("email ili lozinka nisu tocni"."<br>");
  echo("<a href='../login.php'>Nazad na login</a>"."<br>");
  echo("<a href='../registracija.php'>Registracija</a>");
  exit();
}
else
{
  $korisnik = $rezultatKorisnik->fetch_assoc();
}

$lozinkaIzBaze = $korisnik["lozinka"];

if(!password_verify($lozinka,$lozinkaIzBaze))
{
  echo("email ili lozinka nisu tocni"."<br>");
  echo("<a href='../login.php'>Nazad na login</a>"."<br>");
  echo("<a href='../registracija.php'>Registracija</a>");
  exit();
}
else
{
  $_SESSION['ime'] = $korisnik['ime'];
  $_SESSION['user_id'] = $korisnik['id'];
  $_SESSION['ulogovan'] = true;
  header("Location: ../index.php");
  exit();
}

