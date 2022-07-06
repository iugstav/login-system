<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: /views/authorized.php");
} else {
  header("Location: /views/signup.php");
}
