<?php

function izracunajPDV($iznos)
{
    if(!is_numeric($iznos))
    {
      die("Broj mora biti numericka vrednost");
    }
    elseif($iznos < 1)
    {
      die("Broj ne moze biti manji od 1");
    }
    else
    {
      $total = $iznos * 0.22;
      echo "PDV iznosi $total eura";
    }
}

izracunajPDV(0);




?>