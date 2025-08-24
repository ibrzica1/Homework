<?php

require_once "modeli/Zivotinja.php";
require_once "modeli/Kopnena.php";
require_once "modeli/Vodena.php";
require_once "modeli/Pas.php";
require_once "modeli/Kokoska.php";
require_once "modeli/Riba.php";
require_once "modeli/Meduza.php";

$labrador = new Pas;
$labrador->cuvar = false;
$labrador->duzinaRepa = 30;
$labrador->leti = false;
$labrador->brojNogu = 4;
$labrador->tezina = 15;
$labrador->visina = 50;
$labrador->duzina = 110;
$labrador->brzina = 32;
$labrador->prehrana = "mesojed";

$stuka = new Riba;
$stuka->brojPeraja = 7;
$stuka->imaZube = true;
$stuka->vrstaVode = "rijecna";
$stuka->tezina = 1;
$stuka->duzina = 50;
$stuka->prehrana = "mesojed";


