<?php

if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

if(!isset($_POST['id_proizvoda']) || empty($_POST['id_proizvoda']))
{
  die("Morate uneti ID proizvoda");
}

if(!isset($_POST['kolicina']) || empty($_POST['kolicina']))
{
  die("Morate uneti kolicinu");
}

require_once "baza.php";


$idProizvoda = $_POST['id_proizvoda'];
$kolicina = $_POST['kolicina'];

$userName = $_SESSION['ime'];
$rezultat = $baza->query("SELECT * FROM user WHERE ime='$userName' ");
$user = $rezultat->fetch_assoc();

$idKorisnika = $user['id'];

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE id='$idProizvoda' ");
$proizvod = $rezultat->fetch_assoc();

$cena = $proizvod["cena"];
$cena = $cena * $kolicina;

$idProizvoda = $baza->real_escape_string($idProizvoda);
$idKorisnika = $baza->real_escape_string($idKorisnika);
$cena = $baza->real_escape_string($cena);
$kolicina = $baza->real_escape_string($kolicina);

$baza->query("INSERT INTO narudzbine(id_proizvoda,id_korisnika,cena,kolicina) 
VALUES ($idProizvoda,$idKorisnika,$cena,$kolicina)");
