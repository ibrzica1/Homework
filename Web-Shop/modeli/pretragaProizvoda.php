<?php

if(!isset($_GET["pretraga"]) || empty($_GET["pretraga"]))
{
  die("Niste unijeli nista u pretragu");
}
else
{
  $pretraga = $_GET["pretraga"];
}

require_once("baza.php");

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$pretraga%' OR opis LIKE '%$pretraga%' ");

if($rezultat->num_rows < 1)
{
  die("Nema rezultata");
}

foreach($rezultat as $proizvod)
{
  echo $proizvod["ime"];
}