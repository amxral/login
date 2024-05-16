<?php 

if (isset($_POST['submit'])) {
    include_once('config.php');

    $email = $_POST['email'];

    // Verifica se o e-mail já está cadastrado
    $query = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // O e-mail já está em uso
        $mensagem_erro = "E-mail já cadastrado. Por favor, use outro e-mail.";
    } else {
        // O e-mail não está em uso, então insira o novo usuário
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $data_nasc = "$dia-$mes-$ano";
        $contato = $_POST['contato'];
        $senha = $_POST['senha'];

        $query = "INSERT INTO usuarios(nome, sobrenome, data_nasc, contato, email, senha) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $query);
        mysqli_stmt_bind_param($stmt, 'ssssss', $nome, $sobrenome, $data_nasc, $contato, $email, $senha);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirecione para a página de confirmação
            header("Location: confirmacao.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="icon.png" type="image/x-icon">
  <link rel="stylesheet" href="cadastro.css">
  <style>
    * {
    padding: 0px;
    margin: 0px;
    }

    body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient( 85.2deg,  rgba(33,3,40,1) 7.5%, rgba(65,5,72,1) 88.7% );
    height: 97vh;
    }
    h1 {
    color: #fff;
    text-align: center;
    padding: 20px;
    }

    section {
    padding: 20px;
    width: 80%;
    max-width: 400px;
    margin: auto;
    color: white;
    background-color: rgba(0, 0, 0, 0.600);
    backdrop-filter: blur(10px);
    box-shadow: 1px 1px 3px Black;
    height: 100%;
    }

    p {
    padding: 15px;
    }

    div.cad input {
    background-color: transparent;
    color: rgb(255, 255, 255);
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #b5b5b6 1px;
    padding: 3px 10px;
    width: 95%;
    outline: none;
    outline-style: none;
    }
    div.cad input::-webkit-input-placeholder {
    color: rgb(224, 222, 222);
    }

    div.cad input:-moz-placeholder { /* Firefox 18- */
    color: rgb(224, 222, 222);  
    }

    div.cad input::-moz-placeholder {  /* Firefox 19+ */
    color:rgb(224, 222, 222);  
    }

    div.cad input:-ms-input-placeholder {  
    color: rgb(224, 222, 222);
    }

    div.btn {
        padding-left: 15px;
        margin-top: 20px;
        color: #fff;
    }
    div.btn input {
        height: 40px;
        width: 47%;
        padding: 10px;
        border-radius: 10px;
        font-size: 1em;
        font-weight: bold;
        color: #fff;
        background-color: rgba(54, 164, 80, 0.671);
        margin: 2px;
        border-style: none;
    }
    div.btn > input#limpar {
    background-color: #61615F;
    }
    select {
        background-color: #61615F;
        color: white;
        padding: 3px;
        border: 1px solid rgb(224, 224, 224);
        border-radius: 5px;
    }
    div.btn > input {
        display: inline-block;
        align-items: center;
        justify-content: center;
        line-height: 1;
        text-decoration: none;
        color: #ffffff;
        font-size: 1em;
        border-radius: 15px;
        max-width: 48%;
        height: 40px;
        font-weight: bold;
        border: 3px solid rgba(65,5,72,1) 88.7%;
        transition: 0.3s;
        background-color: rgba(54, 164, 80, 0.900);
        }

        div.btn > input:hover {
        transform: scale(1.05);
        background-color: darkgreen;
        }
  </style>
  <title>Cadastro</title>
</head>
<body>
  <main>
    <section>

    <h1>Cadastro</h1>

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
          <input type="tel" name="contato" id="phone" required placeholder="Contato *"/>
        </p>
        <p>
          <input type="email" name="email" id="mail" placeholder="E-mail *" required />
        </p>
        <p>
          <input type="password" name="senha" id="senha" placeholder="Senha: mínimo 8 caracteres" minlength="8" required/>
        </p>
        </div>
        <?php 
        if (isset($mensagem_erro)): ?>
            <p style="color: darkred; margin: 0; padding: 0; text-align: center;">
                <?php echo $mensagem_erro; ?>
            </p>
        <?php endif; ?>
        <div class="btn">
          <input type="reset" name="limpar" id="limpar" value="Limpar"/>
          <input type="submit" name="submit" id="envia" value="Enviar"/>
        </div>
      </form>
       <p  style="text-align: center;"><a style="color: white; text-align: center" href="index.html">Cancelar</a></p>
    </section>
   
  </main>

  <script src="script.js"></script>
</body>
</html>