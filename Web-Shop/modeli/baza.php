<?php

$baza = mysqli_connect("localhost","root","","web_shop");

if(mysqli_connect_error())
{
  die("Problem povezivanja sa bazom");
}