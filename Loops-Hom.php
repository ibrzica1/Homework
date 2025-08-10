<?php

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

?>

<!DOCTYPE html>

<head>
  <title> <?= $naslovSajta ?> </title>
</head>
<body>
  
  <nav>
    <?php foreach($stavke as $kljuc => $vrijednost) : ?>

      <a href="<?= $vrijednost["link"] ?>"><?= $vrijednost["title"] ?></a>

    <?php endforeach; ?>

  </nav>
  
  
</body>
</html>