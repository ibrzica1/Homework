<?php

$cena = $_GET["cena"];
$opcije = $_GET["opcije"];

if(is_numeric($cena))
{
  $ukupnaCena = $cena;

    if($opcije == "hrana")
    {
      $ukupnaCena = $ukupnaCena + 150;
    }
    elseif($opcije == "oprema_za_racunare")
    {
      $ukupnaCena = $ukupnaCena + 350;
    }

    if(isset($_GET["porez"]))
    {
      $ukupnaCena = $ukupnaCena + ($ukupnaCena * 0.1);
      echo $ukupnaCena;
    }
    else
    {
      echo $ukupnaCena;
    }
}
else
{
  echo "Unos mora biti broj";
}

?>