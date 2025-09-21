<?php

require_once "Database.php";

class User extends Database
{
  public $username;
  public $password;

  public function userExists($username)
  {
    $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username ");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->rowCount() >= 1)
    {
      return true;
    }
    return false;
  }

  public function registerUser($username, $password)
  {
    $stmt = $this->connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    $stmt->execute();
  }
}