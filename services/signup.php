<?php
session_start();

require_once "../models/User.php";
require_once "../auth/Uuid.php";

use Models\User;
use Auth\UUID;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id = UUiD::v4();
  $username = htmlspecialchars(trim($_POST["username"]));
  $password = htmlspecialchars(trim($_POST["password"]));
  $email = htmlspecialchars(trim($_POST["user_email"]));

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $user = User::create([
    'id' => $id,
    'name' => $username,
    'password' => $hashedPassword,
    'email' => $email
  ]);

  $userAlreadyExists = $user->exists();

  if ($userAlreadyExists) {
    header("Location: /signup.php");
    return false;
    exit;
  }

  $user->addToDatabase();
}

header('Location: /views/login.php');
