<?php

require_once "Baza.php";

class User extends Baza
{
  public $ime;
  public $email;
  public $lozinka;

  public function setName($name)
  {
    $name = ucfirst($name);
    return $this->ime = $name;
  }

  public function postojiMail($posta)
  {
    $rezultat = $this->konekcija->query("SELECT * FROM user WHERE email = '$posta' ");

    if($rezultat->num_rows > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function registerUser($naziv,$posta,$sifra)
  {
    if($this->postojiMail($posta))
    {
      die("Korisnik vec postoji u bazi");
    }
    $sifra = password_hash($sifra, PASSWORD_BCRYPT);
    $sifra = $this->konekcija->real_escape_string($sifra);
    $naziv = $this->konekcija->real_escape_string($naziv);
    $posta = $this->konekcija->real_escape_string($posta);
    
      $this->konekcija->query("INSERT INTO user(ime, email, lozinka)
      VALUES ('$naziv','$posta','$sifra') ");
    
  }

  public function deleteUser($userId)
  {
    $userId = $this->konekcija->real_escape_string($userId);

    $this->konekcija->query("DELETE FROM user WHERE id = '$userId'");
  }

  public function updateUser($userId,$posta,$sifra)
  {
   
    $sifra = password_hash($sifra, PASSWORD_BCRYPT);
    $userId = $this->konekcija->real_escape_string($userId);
    $posta = $this->konekcija->real_escape_string($posta);
    $sifra = $this->konekcija->real_escape_string($sifra);

    $this->konekcija->query("UPDATE user SET email = '$posta', lozinka = '$kriptovanaSifra' WHERE id = '$userId' ");
  }
}