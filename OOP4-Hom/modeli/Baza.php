<?php

class Baza
{
  public $konekcija;

  public function __construct()
  {
    $this->konekcija = mysqli_connect("localhost","root","","mojastranica");
  }
}