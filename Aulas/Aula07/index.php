<?php 

    $i = 0;
    $tam = 10;
    $vet = array($tam);


    while($i < $tam){
        echo "Tamanho da variavel i: $i<br/>";
        $i++;
    }

    echo "<hr/>";

    $i = 0;
    while($i < $tam){
        $vet[$i] = $i;
        $i++;
    }


    $i = 0;
    while($i < $tam){
        echo "$vet[$i]<br/>";
        $i++;
    }

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Loop While</title>
    </head>
    <body>

    </body>
</html>