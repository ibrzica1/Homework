
<?php

  $ime = "adminisTrator";
  $lozinka = "mojaSifraJeSigurna";

  if(strtolower($ime) == "administrator" && $lozinka == "mojaSifraJeSigurna")
  {
    echo "Dobrodosao administratore". "<br />";
  }
  else
  {
    echo "Ime ili lozinka nisu dobri". "<br />";
  }

  
  $trenutnoSati = date("H");

  if($trenutnoSati > 5 && $trenutnoSati < 12)
  {
    echo "Jutro je". "<br />";
  }
  elseif($trenutnoSati > 12 && $trenutnoSati < 20)
  {
    echo "Podne je". "<br />";
  }
  elseif($trenutnoSati > 20 && $trenutnoSati < 5)
  {
    echo "Noc je". "<br />";
  }



?>