<?php

  if(isset($_POST["name"]))
  {
    $name = strtolower(trim($_POST["name"]));
  }
  else
  {
    die ("Ime nije prosledeno");
  }

  $nameArray = ["toma", "petar", "marko"];

  if(strlen($name) > 3)
  {
    if($name == $nameArray[0] || $name == $nameArray[1] || $name == $nameArray[2])
    {
      echo "Uspesno smo pronasli korisnika";
    }
    else
    {
      echo "Nismo pronasli ime u listi korisnika";
    }
  }
  else
  {
    echo "Ime mora biti barem 3 karaktera";
  }


?>