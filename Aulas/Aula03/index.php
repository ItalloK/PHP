<?php 
    $num1 = 10;
    $num2 = 5;

    echo "Valor de num1= $num1 e o valor de num2 = $num2<br/><br/><br/><br/>";

    // Operadores Matematicos

    $res = $num1 + $num2;
    echo "Resultado da soma de $num1 + $num2 é: ".$res."<br/>";
    $res = $num1 - $num2;
    echo "Resultado da subtração de $num1 - $num2 é: $res <br/>";
    $res = $num1 * $num2;
    echo "Resultado da multiplicação de $num1 * $num2 é: ".$res."<br/>";
    $res = $num1 / $num2;
    echo "Resultado da divisão de $num1 / $num2 é: $res <br/>";

    $res = ($num1 + $num2) * 2;
    echo "Resultado: $res <br/>";

    $res = $num1 % $num2; // pega o resto da divisão.
    echo "Resto da divisão de $num1 com $num2 é: $res<hr/>";
    

    $num1++; // incremento +1
    $num1--; // decremento -1
    echo "Novo valor de num1 = $num1<br/>";

    $num2 += 2; // Incremento com +=
    echo "Novo valor de num2 (soma) = $num2<br/>";

    $num2 -= 2; // Decremento com -=
    echo "Novo valor de num2 (subtr) = $num2<br/>";

    $num2 *= 2; // Multipliacacao com *=
    echo "Novo valor de num2 (multi) = $num2<br/>";
    $res = $num1 == $num2;
    echo "Num1 = Num2: $res<br/>"; // 1 true, 0 false;

    /////////////////////////////////////////////

    $num1 == $num2;
    $num1 != $num2; // diferente ( pode ser tambem = $num1 <> $num2 )
    $num1 > $num2;
    $num1 < $num2;
    $num1 >= $num2;
    $num1 <= $num2;

    //Existe tambem ( and e or ) 
    // and == &&
    // or == || 


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Operações com Variaveis</title>
    </head>
    <body>

    </body>
</html>