<?php

declare(strict_types= 1);

require_once "DB.php";

class Images extends DB
{
  const ALLOWED_EXTENSIONS = ["jpg", "jpeg", "png", "gif"];
  const MAX_FILE_SIZE = 40 * 1024 * 1024;
  const MAX_IMAGE_WIDTH = 1920;
  const MAX_IMAGE_HEIGHT = 1024;

  public function uploadImage(array $image, string $name): void
  {
    $finalPath = "images/$name";

    $tmpFileName = $image['tmp_name'];

    move_uploaded_file($tmpFileName, $finalPath);
    
    $name = $this->connection->real_escape_string($name);
    $this->connection->query("INSERT INTO images (image) VALUES ('$name')");
  }

  public function isValidSize(array $image): bool
  {
    $size = $image['size'];

    return $size < self::MAX_FILE_SIZE;
    
  }

  public function generateRandomName(string $extension): string
  {
    return uniqid().".".$extension;
  }

  public function isValidExtension(array $image): bool
  {
    $imageType = pathinfo($image['name'], PATHINFO_EXTENSION);

    return in_array($imageType, self::ALLOWED_EXTENSIONS);
    
  }

  public function isValidDimension(array $image): bool
  {
    $image_info = getimagesize($image["tmp_name"]);

    $imageWidth = $image_info[0];
    $imageHeight = $image_info[1];

    return $imageWidth < self::MAX_IMAGE_WIDTH && $imageHeight < self::MAX_IMAGE_HEIGHT;
    
  }

  public function getAllImages(): array
  {
    $result = $this->connection->query("SELECT * FROM images");
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}