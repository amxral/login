<?php 

    if(isset($_POST['submit'])) {

  //   print_r($_POST['data_nasc']);
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
    $sobrenome = $_POST['sobrenome'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano']; 
    $data_nasc = $dia . '-' . $mes . '-' . $ano; 
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,sobrenome,data_nasc,contato,email,senha) VALUES ('$nome','$sobrenome','$data_nasc','$contato','$email','$senha')");

    $query = "INSERT INTO usuarios(nome, sobrenome, data_nasc, contato, email, senha) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $nome, $sobrenome, $data_nasc, $contato, $email, $senha);
    mysqli_stmt_execute($stmt);

    
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
      <form action="cadastro.php" method="POST" autocomplete="on">
        <p>
          <input type="text" name="nome" id="nome" placeholder="Nome" required/>
        </p>
        <p>
          <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required />
        </p>
        <p>
          <label for="nascimento">Data de Nascimento:</label>
          <!-- <input type="date" name="data_nasc" id="nasc"> -->
          
          <select name="dia" id="nasc" required>
          <option value="" disabled selected>Dia</option>
          </select>

          <select name="mes" id="mes" required>
          <option value="" disabled selected>Mês</option>
          </select>

          <select name="ano" id="anos" required>
          <option value="" disabled selected>Ano</option>
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
      <p  style="text-align: center;"><a style="color: white; text-align: center" href="index.html">Cancelar</a></p>
    </section>
    
  </main>

  <script src="script.js"></script>
</body>
</html>