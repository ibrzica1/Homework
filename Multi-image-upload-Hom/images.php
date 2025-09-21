<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

 require_once "models/Images.php"; $data = new Images(); 
 ?>

<html>

<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" href="styles/images.css">
</head>

<body>

    <?php if(isset($_SESSION["imageErrors"])): ?>
        <?php foreach($_SESSION["imageErrors"] as $error): ?>
        <?php $message = htmlspecialchars($error); ?>
        <div>
           <p class="message"><?= $message ?></p>
        </div>
        <?php endforeach; ?>
        <?php unset($_SESSION["imageErrors"]); ?>
    <?php endif; ?>

    <div class="image-gallery">
        <?php foreach($data->getAllImages() as $image): ?>
            <div class="gallery-image-container">
                <img src="images/<?= htmlspecialchars($image['image']) ?>" alt="Image from gallery">
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>