<?php

require_once "DB.php";

class Images extends DB
{
  const ALLOWED_EXTENSIONS = ["jpg", "jpeg", "png", "gif"];
  const MAX_FILE_SIZE = 40 * 1024 * 1024;
  const MAX_IMAGE_WIDTH = 1920;
  const MAX_IMAGE_HEIGHT = 1024;

  public function uploadImage($image,$name)
  {
    $finalPath = "images/$name";

    $tmpFileName = $image['tmp_name'];

    move_uploaded_file($tmpFileName, $finalPath);
    
    $name = $this->connection->real_escape_string($name);
    $this->connection->query("INSERT INTO images (image) VALUES ('$name')");
  }

  public function isValidSize($image)
  {
    $size = $image['size'];

    if($size > self::MAX_FILE_SIZE)
    {
      return false;
    }
    return true;
  }

  public function generateRandomName($extension)
  {
    return uniqid().".".$extension;
  }

  public function isValidExtension($image)
  {
    $imageType = pathinfo($image['name'], PATHINFO_EXTENSION);

    if(!in_array($imageType, self::ALLOWED_EXTENSIONS))
    {
      return false;      
    }
    return true;
  }

  public function isValidDimension($image)
  {
    $image_info = getimagesize($image["tmp_name"]);

    $imageWidth = $image_info[0];
    $imageHeight = $image_info[1];

    if($imageWidth > self::MAX_IMAGE_WIDTH || $imageHeight > self::MAX_IMAGE_HEIGHT)
    {
      return false;
    }

    return true;
  }
}