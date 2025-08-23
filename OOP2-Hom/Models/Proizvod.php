<?php

class Proizvod
{
  public $ime;
  public $opis;
  public $cena;
  public $kolicina;

  public function __construct($ime,$opis,$cena,$kolicina)
  {
      $this->ime = $ime;
      $this->opis = $opis;
      $this->cena = $cena;
      $this->kolicina = $kolicina;
  }

  public function save()
  {
    $baza = mysqli_connect("localhost","root","","mojastranica");
    $ime = $baza->real_escape_string($this->ime);
    $opis = $baza->real_escape_string($this->opis);
    $cena = $baza->real_escape_string($this->cena);
    $kolicina = $baza->real_escape_string($this->kolicina);

    $baza->query("INSERT INTO proizvodi(ime,opis,cena,kolicina)
    VALUES ('$ime','$opis',$cena,$kolicina) ");
  }

}