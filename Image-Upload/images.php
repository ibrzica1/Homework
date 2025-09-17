<?php

require_once "models/DB.php";
$sql = new DB();

$result = $sql->connection->query("SELECT * FROM images");
$images = $result->fetch_all(MYSQLI_ASSOC);

?>

<html>

<head>

</head>

<body>
  <?php foreach($images as $image): ?>
    <img src="images/<?= $image['image'] ?>">
  <?php endforeach; ?>
</body>

</html>