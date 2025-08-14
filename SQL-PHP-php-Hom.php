<?php

$baza = mysqli_connect("localhost","root","","web_shop");

if(mysqli_connect_error())
{
  die("Problem povezivanja sa bazom");
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  die("Niste unijeli email");
}
else
{
  $email = $_POST["email"];
}

if(!isset($_POST["sifra"]) || empty($_POST["sifra"]))
{
  die("Niste unijeli lozinku");
}
else
{
  $sifra = $_POST["sifra"];
}

$insertKorisnik = "INSERT INTO korisnici(email,sifra)
VALUES ('$email','$sifra')";

$baza->query($insertKorisnik);