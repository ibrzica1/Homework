<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/User.php";

$user = new User();

if(!isset($_POST['username']) || empty($_POST['username']))
{
  $_SESSION['message'] = "You didnt send username";
  header("Location: ../index.php");
  exit();
}

if(!isset($_POST['password']) || empty($_POST['password']))
{
  $_SESSION['message'] = "You didnt send password";
  header("Location: ../index.php");
  exit();
}

$username = $_POST['username'];
$password = $_POST['password'];

if($user->userExists($username))
{
  $_SESSION['message'] = "Username already exists";
  header("Location: ../index.php");
  exit();
}

$user->registerUser($username,$password);

header("Location: ../index.php");