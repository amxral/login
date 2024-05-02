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
} else {
    echo '<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="sistema.css">
        <title>Sistema Aquel</title>
    </head>
    <body>
        <h1>Sistema Simulator - Aquel</h1>
        <div id="main">
            
            <div id="btn">
                <button onclick="gerarNome()">Gerar Informações</button>
                <button id="limparButton" onclick="limparInformacoes()">Limpar</button>
                <button id="pausarButton" onclick="pausarCronometro()">Pausar</button>
                <button id="resetarButton" onclick="resetarCronometro()">Resetar</button>
            </div>
    
            <h2>Informações Geradas:</h2>
    
            <div id="tab">
                <table>
                    <tr>
                        <th>Nome Pessoal</th>
                        <td id="nomePessoal"></td>
                    </tr>
                    <tr>
                        <th>Empresa</th>
                        <td id="nomeEmpresa"></td>
                    </tr>
                    <tr>
                        <th>Valor Bruto</th>
                        <td id="valorBruto"></td>
                    </tr>
                    <tr>
                        <th>Valor Líquido</th>
                        <td id="valorLiquido"></td>
                    </tr>
                    <tr>
                        <th>Taxa (%)</th>
                        <td id="taxa"></td>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <td id="dataAleatoria"></td>
                    </tr>
                    <tr>
                        <th>Tempo de Chamada</th>
                        <td id="cronometro">00:00:00</td>
                    </tr>
                </table>
            </div>
        </div>
        <p id="ext"><a href="https://www.4devs.com.br/gerador_de_cep" target="_blank">Endereço Gerador Externo</a></p>
    
        <script src="sistema.js"></script>
    </body>
    </html>';
}

// Fechar a declaração e a conexão
$stmt->close();
$conexao->close();
?>