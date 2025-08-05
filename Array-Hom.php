
<?php

$naslovSajta = "Postani Programer";
$stavke = ["Glavna", "O nama", "Kontakt"];

?>

<!DOCTYPE html>

<head>
  <title> <?= $naslovSajta ?> </title>
</head>
<body>
  <h1><?= $naslovSajta ?></h1>
  <nav>
    <a><?= "$stavke[0]" ?></a>
    <a><?= "$stavke[1]" ?></a>
    <a><?= "$stavke[2]" ?></a>
  </nav>
  
  
</body>
</html>