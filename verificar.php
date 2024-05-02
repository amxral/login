<?php
// Configurações do banco de dados
$dbHost = 'sql209.infinityfree.com';
$dbUsername = 'if0_36457040';
$dbPassword = 'pYy54hCyJFroYt';
$dbName = 'if0_36457040_formulario';

// Conexão com o banco de dados usando mysqli
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// echo "Conexão efetuada com sucesso";

// Obter dados do POST de maneira segura
$email = $_POST['login'];
$senha = $_POST['senha'];

// Usar prepared statements para prevenir injeção de SQL
$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

// Vincular parâmetros e executar a consulta
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

// Verificar se encontramos uma linha correspondente
if ($result->num_rows === 0) {
    echo "Login ou senha inválidos";
    echo "<br>";
    echo "Volte e tente novamente";
} // else {
  //  echo "Bem-vindo(a)!";
  // }

// Fechar a declaração e a conexão
$stmt->close();
$conexao->close();
?>