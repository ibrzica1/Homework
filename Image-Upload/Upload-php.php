<?php

if(!isset($_FILES['profileImage']))
{
  die("Niste prosledili profilnu sliku");
}

$profileImage = $_FILES['profileImage'];

require_once "models/Images.php";

$image = new Images();

$randomName = $image->generateRandomName('jpg');

$imageFolder = "images/";

if(!is_dir($imageFolder))
{
  mkdir($imageFolder, 0755, true);
}

if(!$image->isValidSize($profileImage))
{
  die("Slika je prevelika");

}

if(!$image->isValidDimension($profileImage))
{
  die("Image width cant be wider than 1920 or higher than 1024");
}

if(!$image->isValidExtension($profileImage))
{
  die("Format slike nije dobar");
}

$image->uploadImage($profileImage,$randomName);