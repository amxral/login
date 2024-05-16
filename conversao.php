<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conversor.css">
    <style>
        span {
            font-size: .6em;
            border: 1px solid blueviolet;
            border-radius: 5px;
            padding: 3px;
        }
        em {
            font-weight: bold;
            font-size: .9em;
            color: blueviolet;
        }
        a {
            color: whitesmoke;
            text-decoration: none;
            background: none;
        }
        body {
            background-image: linear-gradient(85.2deg, rgba(33,3,40,1) 7.5%, rgba(65,5,72,1) 88.7%);
        }
        main {
            background-color: rgba(0, 0, 0, 0.600);
            color: white;
        }
        h1 {
            color: #fff;
        }
        label {
            color: #fff;
        }
        form {
            background-image: linear-gradient(85.2deg, rgba(33,3,40,1) 7.5%, rgba(65,5,72,1) 88.7%);
        }
        button {
            background-color: rgba(40,10,50,1);
        }
    </style>
    <title>Conversor de Moedas</title>
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
        <?php
            //Cotação copiada do API do BCB
            $inicio = date("m-d-Y", strtotime("-7 days"));
            $fim = date("m-d-Y");
        
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
            
            $dados = json_decode(file_get_contents($url), true);
        
            $cotacao = $dados["value"][0]["cotacaoCompra"];
            ;

            //Quanto $$ você tem?
            $real = $_GET['din'] ?? 0;

            //Equivalêcia em dólar
            $dolar = $real / $cotacao;

            //Formatação de moedas com Internacionalização
            //Biblioteca intl (Internacionalização PHP)
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            echo "<p>Seus " . numfmt_format_currency($padrao, $real, "BRL") . " equivalem a <strong>" . numfmt_format_currency($padrao, $dolar, "USD") . "</strong></p>";
        ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
        <?php
        echo "<span>Cotação atual obtida através do <a href=\"https://www.bcb.gov.br/estabilidadefinanceira/fechamentodolar\" target=\"_black\">Banco Central</a> de: <em>" . numfmt_format_currency($padrao, $cotacao, "BRL") . "</em></span>";
        ?>
    </main>
</body>
</html>