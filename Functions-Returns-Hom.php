<?php



function izracunajDostavu($cena,$grad)
{
  $grad = strtolower($grad);
  $kilometri = 0;
  $cijenaDostava = 0;

  $dostava = [
  "subotica" => 220,
  "pancevo" => 10,
  "sarajevo" => 292,
  "split" => 799
   ];

  if(!array_key_exists($grad,$dostava))
  {
    echo "Za ovaj grad nema dostave";
    return;
  }

  foreach($dostava as $mjesto => $udaljenost)
  {
    if($mjesto == $grad)
    {
      $kilometri = $udaljenost;
    }
  }

  if($kilometri <= 100)
  {
    $cijenaDostava = 200;
  }
  elseif($kilometri > 100 && $kilometri <= 200)
  {
    $cijenaDostava = 350;
  }
  elseif($kilometri > 200)
  {
    $cijenaDostava = 500;
  }

  $grad = ucfirst($grad);

  return "Rastojanje $grad - Beograd je $kilometri km, dostava je $cijenaDostava din.";


}

echo izracunajDostavu(2000,"pancevo");



?>