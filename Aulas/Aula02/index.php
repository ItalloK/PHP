<?php
    // Variaveis 

    $vNome = "Ohayo Pokko";
    $vNum = 10;
    $vNum2 = 20.5;
    $soma = 0;

    // Constantes

    define("cNome","Italo Gabriel");  // Para definir uma constante
    define("ver", PHP_VERSION);
    define("dir", __DIR__);

    //--------------------------------------------------------------------------------------------------------//
    echo "Nome: $vNome<br/>";
    $vNome = "Italo";
    echo "Nome: $vNome<br/>";
    echo "Nome: ".$vNome."<br/>"; // usa . no lugar de +
    $vSoma = 10+20;
    echo "Soma: $vSoma<br/>";

    echo "<hr/>";
    echo "Constante cNome: ".cNome."<br/>"; // só da pra declarar constante assim

    echo "Nome do arquivo: ".__FILE__."<br/>"; // Constante nome do arquivo
    echo "Versao php: ".ver."<br/>"; // isso ou abaixo
    echo "Versao php: ".PHP_VERSION."<br/>";
    echo "Diretorio: ".dir."<br/>";

    echo "Versão do SO: ".PHP_OS."<br/>";
    echo "Numero da linha: ".__LINE__."<br/>";
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Constantes e Variaveis</title>
    </head>
    <body>

    </body>
</html>