<?php

require_once("baza.php");


if(mysqli_connect_error())
{
  die("Problem povezivanja sa bazom");
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  die("Niste unijeli email");
}

if(!isset($_POST["sifra"]) || empty($_POST["sifra"]))
{
  die("Niste unijeli lozinku");
}

$email = $_POST["email"];

$emailPostoji = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

if($emailPostoji->num_rows > 0)
{
  die("Email vec postoji");
}

$sifra = password_hash($_POST["sifra"], PASSWORD_BCRYPT);

$insertKorisnik = "INSERT INTO korisnici(email,sifra)
VALUES ('$email','$sifra')";

$baza->query($insertKorisnik);

$containGmail = $baza->query("SELECT * FROM korisnici WHERE email LIKE '%@gmail%' ");
