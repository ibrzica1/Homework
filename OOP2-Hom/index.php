<?php

require_once "Models/User.php";
require_once "Models/Proizvod.php";

$korisnikIgor = new User("Brzi","igorbrzica1@gmail.com","12345");

$televizor = new Proizvod("televizor","Nesto za gledati",430,10);

$televizor->save();

