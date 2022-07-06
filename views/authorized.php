<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem-vindo!</title>
</head>

<body>
  <h1>eh papai agora você tá on! bem-vindo <?php echo $_SESSION['username'] ?></h1>
  <p>quer sair da conta? <a href="../services/logout.php">clica aqui vacilao</a></p>
</body>

</html>