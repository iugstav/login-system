<?php
session_start();

require_once "../models/User.php";

use Models\User;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = htmlspecialchars(trim($_POST["user_email"]));
  $password = htmlspecialchars(trim($_POST["password"]));



  $user = User::create([
    'email' => $email,
    'password' => $password
  ]);

  $userExists = $user->findByEmail();

  $isPasswordValid = password_verify($password, $userExists[0]["password"]);

  if ($isPasswordValid) {
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['username'] = $userExists[0]['name'];
    $_SESSION['userId'] = $userExists[0]['id'];

    header("Location: /views/authorized.php");
    return true;
  } else {
    header("Location: /views/login.php");
    return false;
  }
}
