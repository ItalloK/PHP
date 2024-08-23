<?php 
    // Arrays

    $vet=array(7);

    $vet[0] = "Carro";
    $vet[1] = "Avião";
    $vet[2] = "Navio";
    $vet[3] = "Moto";
    $vet[4] = "Onibus";
    $vet[5] = 123456; // aceita inteiro e string
    for($i = 0; $i<6; $i++){
        echo "$vet[$i] <br/>";
    }

    echo "<hr/><br/>";

    $vet2 = array("nome"=>"Italo", "cidade"=>"Sao Luis", "curso" => "PHP");
    echo "Nome: ".$vet2["nome"]." - Cidade: ".$vet2["cidade"]." - Curso: ".$vet2["curso"]."<br/>";

    $vet[6] = $vet2["nome"];
    echo "Posicao 6: $vet[6] <br/>";

    echo "<hr/><br/>";

    $mat=array(
        array("Carro1",65000),
        array("Carro2", 35000),
        array("Carro3", 50000)
    );

    echo "Carro A: ".$mat[0][0]." - Valor: ".$mat[0][1]."<br/>";
    echo "Carro B: ".$mat[1][0]." - Valor: ".$mat[1][1]."<br/>";
    echo "Carro C: ".$mat[2][0]." - Valor: ".$mat[2][1]."<br/>";

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Vetores</title>
    </head>
    <body>

    </body>
</html>