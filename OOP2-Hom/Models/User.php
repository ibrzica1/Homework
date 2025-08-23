<?php

class User
{
  public $ime;
  public $email;
  public $lozinka;

  public function __construct($naziv, $mejl, $sifra)
  {
    $this->ime = $naziv;
    $this->email = $mejl;
    $this->lozinka = $sifra;
  }

  public function save()
  {
    $baza = mysqli_connect("localhost","root","","mojastranica");

    $ime = $baza->real_escape_string($this->ime);
    $email = $baza->real_escape_string($this->email);
    $lozinka = $baza->real_escape_string($this->lozinka);

    $baza->query("INSERT INTO user(ime, email, lozinka)
    VALUES ('$ime','$email','$lozinka') ");
  }
}