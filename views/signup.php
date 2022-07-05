<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sign up</title>

  <link rel="stylesheet" href="public/css/index.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <main>
    <form action="./services/signup.php" method="POST">
      <h1>Sign up</h1>
      <div class="inputs">
        <div class="input-wrapper">
          <label for="username">Nome</label>
          <input type="text" name="username" id="username" placeholder="Joãozinho da Silva" required>
        </div>
        <div class="input-wrapper">
          <label for="password">Senha</label>
          <input type="password" name="password" id="password" placeholder="•••••••••••" required>
        </div>
        <div class="input-wrapper">
          <label for="email">Email</label>
          <input type="email" name="user_email" id="email" placeholder="joaozinho10@gmail.com" required>
        </div>
      </div>

      <a href="./login.php">Já possui uma conta? Entre.</a>
      <button type="submit" class="submit-btn">Criar</button>
    </form>
  </main>

</body>

</html>