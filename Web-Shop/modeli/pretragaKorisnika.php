<?php

require_once("baza.php");

if(!isset($_POST["search"]) || empty($_POST["search"]))
{
  die("Niste unijeli polje pretrazivanje");
}

$search = $_POST["search"];

$emailPostoji = $baza->query("SELECT * FROM korisnici WHERE email LIKE '%$search%' ");

if($emailPostoji->num_rows > 0)
{
  foreach($emailPostoji as $email)
  {
    echo $email["email"]."<br>";
  }
}
else
{
  die ("Email ne postoji u bazi");
}