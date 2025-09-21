<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "models/Images.php";

$image = new Images();

if(!isset($_FILES['profileImage']))
{
  die("Niste prosledili profilnu sliku");
}

foreach($_FILES['profileImage']['name'] as $key => $file)
{

    $profileImage = [
        'name' => $_FILES['profileImage']['name'][$key],
        'full_path' => $_FILES['profileImage']['full_path'][$key],
        'type' => $_FILES['profileImage']['type'][$key],
        'tmp_name' => $_FILES['profileImage']['tmp_name'][$key],
        'size' => $_FILES['profileImage']['size'][$key],
    ];

    $randomName = $image->generateRandomName('jpg');

    $imageFolder = "images/";

    if(!is_dir($imageFolder))
    {
      mkdir($imageFolder, 0755, true);
    }

    if(!$image->isValidSize($profileImage))
    {
      $_SESSION['imageErrors'][] = "Slika je prevelika";
      continue;
    }

    if(!$image->isValidDimension($profileImage))
    {
      $_SESSION['imageErrors'][] = "Image width cant be wider than 1920 or higher than 1024";
      continue;
    }

    if(!$image->isValidExtension($profileImage))
    {
      $_SESSION['imageErrors'][] = "Format slike nije dobar";
      continue;
    }

    $image->uploadImage($profileImage,$randomName);

}

header("Location: images.php");

