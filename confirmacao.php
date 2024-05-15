<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css"> <!-- Adicione seu arquivo CSS -->
    <title>Cadastro Concluído</title>
    <style>
        /* Estilos básicos para a página de confirmação */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fonte moderna */
            text-align: center;
            background-image: linear-gradient( 85.2deg,  rgba(33,3,40,1) 7.5%, rgba(65,5,72,1) 88.7% );
            heigth: 90vh;
        }

        h1 {
            color: #fff; /* Cor do título */
            margin: 0;
            padding: 20px;
        }

        .confirmation {
            margin: auto;
            background-color: #e9f7ef; /* Fundo verde suave para indicar sucesso */
            color: #155724; /* Cor do texto */
            padding: 20px;
            max-width: 400px;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            display: block;
        }

        .confirmation p {
            font-size: 18px; /* Tamanho da fonte para o texto */
            margin: 10px 0; /* Espaçamento entre parágrafos */
        }

        .btn {
            margin: 20px;
            background-color: #3498db; /* Cor azul para o botão */
            color: white;
            padding: 10px 20px;
            border: none; /* Sem borda para o botão */
            border-radius: 5px; /* Bordas arredondadas */
            cursor: pointer;
            transition: background-color 0.3s; /* Transição suave ao passar o mouse */
        }

        .btn:hover {
            background-color: #2980b9; /* Cor mais escura ao passar o mouse */
        }
    </style>
</head>
<body>

    <h1>Cadastro Concluído!</h1>

    <div class="confirmation">
        <p>Seu cadastro foi concluído com sucesso!</p>
        <p>Obrigado por se juntar a nós.</p>
    </div>
    
    <button class="btn" onclick="window.location.href='index.html'">Fazer Login</button>

</body>
</html>