
<?php

$naslovSajta = "Postani Programer";
$stavke = [

  "Glavna" => [
      "title" => "Glavna",
      "link" => "http://home.php"
  ],

  "O_nama" => [
      "title" => "O nama",
      "link" => "http://about_us.php"
  ],

  "Kontakt" => [
      "title" => "Kontakt",
      "link" => "http://contact.php"
  ],
];

$trenutnaGodina = date("Y");

?>

<!DOCTYPE html>

<head>
  <title> <?= $naslovSajta ?> </title>
</head>
<body>
  <h1><?= $naslovSajta ?></h1>
  <nav>
    <a href=<?= $stavke["Glavna"]["link"] ?>><?= $stavke["Glavna"]["title"] ?></a>
    <a href=<?= $stavke["O_nama"]["link"] ?>><?= $stavke["O_nama"]["title"] ?></a>
    <a href=<?= $stavke["Kontakt"]["link"] ?>><?= $stavke["Kontakt"]["title"] ?></a>
  </nav>

  <footer>
    <p>Copyright &copy; mojsajt <?= $trenutnaGodina ?></p>
  </footer>
  
  
</body>
</html>