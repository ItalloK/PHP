<?php 

    $opcao = 2; // 1 = Carro, 2 = Moto, 3 = Bicicleta, 4 = Navio, 5 = Avião

    switch($opcao){
        case 1:{
            echo "Carro";
            break;
        }
        case 2:{
            echo "Moto";
            break;
        }
        case 3:{
            echo "Bicicleta";
            break;
        }
        case 4:{
            echo "Navio";
            break;
        }
        case 5:{
            echo "Avião";
            break;
        }
        default:{
            echo "Opção Inválida";
            break;
        }
    }

    echo "<hr/>";

    switch($opcao){
        case ($opcao <= 3 && $opcao > 0):{
            echo "Transporte terrestre";
            break;
        }
        case 4:{
            echo "Transporte maritimo";
            break;
        }
        case 5:{
            echo "Transporte Aereo";
            break;
        }
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Switch - Case</title>
    </head>
    <body>

    </body>
</html>