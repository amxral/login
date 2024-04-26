<?php 

   if(isset($_POST['submit'])) {
  //   print_r($_POST['nascimento'] . '/' . $_POST['mes'] . '/' . $_POST['ano']);
  //   print_r('<br>');
  //   print_r($_POST['contato']);
  //   print_r('<br>');
  //   print_r($_POST['email']);
  //   print_r('<br>');
  //   print_r($_POST['nome']);
  //   print_r('<br>');
  //   print_r($_POST['sobrenome']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $sobrenome = $POST['sobrenome'];
    $data_nasc = $_POST['nascimento'] . '/' . $_POST['mes'] . '/' . $_POST['ano'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $senha =$_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,sobrenome,data_nasc,contato,email,senha) VALUES ('$nome','$sobrenome','$data_nasc','$contato','$email','$senha')");
  
   }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../html5-css3/exercicios/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style-cad.css">
  <title>Cadastro</title>
</head>
<body>
  <main>
    <h1>Cadastro</h1>
    <section>
      <div class="cad">
      <form action="cadastro01.php" method="POST" autocomplete="on">
        <p>
          <input type="text" name="nome" id="nome" placeholder="Nome" required/>
        </p>
        <p>
          <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required />
        </p>
        <p>
          <label for="nascimento">Data de Nascimento:</label>
          <select name="nascimento" id="nasc">
          </select>

          <select name="mes" id="mes">
          </select>

          <select name="ano" id="anos">
          </select>
        </p>
        <p>
          <input type="tel" name="contato" id="phone" required placeholder="Número para contato *" min="10"/>
        </p>
        <p>
          <input type="email" name="email" id="mail" placeholder="E-mail *" required />
        </p>
        <p>
          <input type="password" name="senha" id="senha" placeholder="Senha: mínimo 8 caracteres" minlength="8" required/>
        </p>
        </div>
        
        <div class="btn">
          <input type="submit" name="submit" id="envia" value="Enviar"/>
          <input type="reset" name="limpar" id="limpar" value="Limpar" />
        </div>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>