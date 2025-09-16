<?php

if(!isset($_FILES['profileImage']))
{
  die("Niste prosledili profilnu sliku");
}



$imageSize = $_FILES['profileImage']['size'];

$maxFileSize = 40 * 1024 * 1024;

if($imageSize > $maxFileSize)
{
  die("Slika je prevelika");
}

$image_info = getimagesize($_FILES['profileImage']["tmp_name"]);

$imageWidth = $image_info[0];
$imageHeight = $image_info[1];

if($imageWidth > 1920)
{
  die("Image width cant be wider than 1920");
}
elseif($imageHeight > 1024)
{
  die("Image height cant be higher than 1024");
}

$allowedExtension = ["jpg", "jpeg", "png", "gif"];

$imageType = pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);

if(!in_array($imageType, $allowedExtension))
{
  die("Format slike nije dobar, mora biti: ".implode(',', $allowedExtension));
}

$imageName = time().".".$imageType;

$imageFolder = "images/";

if(!is_dir($imageFolder))
{
  mkdir($imageFolder, 0755, true);
}

$finalPath = "images/$imageName";

$tmpFileName = $_FILES['profileImage']['tmp_name'];

$imageUploaded = move_uploaded_file($tmpFileName, $finalPath);

if($imageUploaded)
{
  die("Uspesno ste dodali sliku");
}
else
{
  die("Neuspesno uploadovanje slike");
}