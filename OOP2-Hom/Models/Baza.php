<?php

class Baza
{
  public $konekcija;

  public function __constructor()
  {
    $this->konekcija = mysqli_connect("localhost","root","","mojastranica");
  }
}