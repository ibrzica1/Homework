<?php

$baza = mysqli_connect("localhost","root","","mojastranica");

if(mysqli_connect_error())
{
  die("Povezivanje sa bazom nije uspjelo");
}