<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="icon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
  <style>
    .toggle-password {
      position: absolute;
      right: 49px;
      top: 51%;
      transform: translateY(-50%);
      cursor: pointer;
    }
    span#olho {
      color: rgba(254,254,254,0.200);
    }
  </style>
</head>
<body>
  <section>

    <h1>Login</h1>

    <form action="sistema.php" method="post">

      <div id="campo">

        <p>
          <span class="material-symbols-outlined">email</span>
          <input type="text" name="email" id="login" required placeholder=" e-mail" style="border-style: none;" />
        </p>
        <p>
          <span class="material-symbols-outlined">lock</span>
          <input type="password" name="senha" id="senha" required minlength="8" placeholder=" senha" style="border-style: none;" class="password-input"/>
          <span class="material-symbols-outlined toggle-password" onclick="togglePasswordVisibility()" id="olho">visibility</span>
        </p>

      </div>
      <div id="btn">

        <a href="cadastro.php">
          <input type="button" name="cadastro" id="cadastro" value="Cadastrar" class="btn"/>
        </a>
          <input type="submit" name="enviar" id="enviar" value="Entrar" class="btn"/>
        <a href="esqsenha.html">
          <input type="button" name="esq" id="esq" value="Esqueci a senha" />
        </a>

      </div>
    </form>

  </section>

  <!-- JAVASCRIPT -->
  <script>
    function togglePasswordVisibility() {
      const passwordField = document.getElementById('senha');
      const toggleIcon = document.querySelector('.toggle-password');

      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.textContent = 'visibility_off'; // Mudar o ícone para mostrar que a senha está visível
      } else {
        passwordField.type = 'password';
        toggleIcon.textContent = 'visibility'; // Mudar o ícone para mostrar que a senha está oculta
      }
    }
  </script>
</body>
</html>
