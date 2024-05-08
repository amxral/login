<?php
// Configurações do banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario';

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
    header("Location: error.html");
    exit();
} else {
    echo '<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="icon.png" type="image/x-icon">
        <link rel="stylesheet" href="sistema.css">
        <style>
            @media screen and (max-width: 769px){
                div#btn {
                    width: 100%;
                }
                div#btn > button {
                    width: 40%;
                    padding: 5px;
                    font-weight: bold;
                    margin: 2px;
                    color: rgb(0, 0, 0);
                    background-color: rgb(4, 255, 0);
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 0.8em;
                    cursor: pointer;
                }
            }
            body {
                background-image: linear-gradient( 85.2deg,  rgba(33,3,40,1) 7.5%, rgba(65,5,72,1) 88.7% );
            }
            header {
                height: 50px;
                display: flex; /* Flexbox para controle de layout */
                justify-content: space-between; /* Espaço entre os elementos */
                align-items: center; /* Alinhar verticalmente no centro */
                padding: 10px; /* Espaçamento interno */
                background-color: background-color: #4158D0;
                background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%); /* Cor de fundo do cabeçalho */
                margin-bottom: 40px;
                box-shadow: 1px 0px 10px black;
            }
    
            header p {
                margin: 0; /* Remover margens para evitar deslocamento */
            }
            form#sair {
                margin: 0; /* Remover margens para garantir alinhamento */
            }
            form#sair > button {
                width: 100px;
                height: 50px;
                font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(217, 9, 9);
                color: white;
                border: none;
                padding: 5px;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.3s ease; /* Transição suave para todas as propriedades */
            }
    
            form#sair > button:hover {
                text-decoration: underline;
                background-color: brown;
                width: 90px; /* Diminuir a largura ao passar o mouse */
                height: 45px; /* Diminuir a altura ao passar o mouse */
            }
        </style>
        <title>Sistema Aquel</title>
    </head>
    <body>
        <header>
                <p>
                <img src="icon.png" alt="icon site">
                SISTEMA AQUEL-WUAZE 
            </p>
            <form id="sair" action="logout.php" method="POST">
                <button type="submit">Encerrar Sessão</button>
            </form>
        </header>
    
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