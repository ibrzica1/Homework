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
if(!isset($_POST["slika"]) || empty($_POST["slika"]))
{
  die("Niste unijeli ime");
}
else
{
  $slika = $_POST["slika"];
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

$insertProizvod = "INSERT INTO proizvodi(ime,opis,cena,slika,kolicina)
VALUES ('$ime','$opis',$cena,'$slika',$kolicina)";

$baza->query($insertProizvod);