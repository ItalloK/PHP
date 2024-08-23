<?php 
    
    // If-Else

    $nota = 70;

    if($nota >= 70){
        echo "<font color = blue>Aprovado.</font>";
    }else if ($nota >= 50){
        echo "<font color = orange>Recuperação.</font>";
    }else{
        echo "<font color = red>Reprovado.</font>";
    }

    echo "<hr/>";

    if($nota >= 40 && $nota <= 60){
        echo "Aluno Selecionado";
    }else{
        echo "Aluno desqualificado";
    }


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>IF e ELSE</title>
    </head>
    <body>

    </body>
</html>