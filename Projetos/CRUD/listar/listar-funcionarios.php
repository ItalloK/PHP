<h1 style="display: inline-block;">Funcionarios</h1>

<?php
    $sql = "SELECT * FROM funcionario";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>CPF</th><th>Nome</th><th>Data de Nascimento</th><th>Endereco</th>
                <th>Sexo</th><th>Salario</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->Cpf . "</td>";
            print "<td>" . $row->Nome . "</td>";
            print "<td>" . convertData($row->Datanasc) . "</td>";
            print "<td>" . $row->Endereco . "</td>";
            print "<td>" . $row->Sexo . "</td>";
            print "<td>" . $row->Salario . "</td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }


    function convertData($data) {
        if (!empty($data) && strpos($data, '-') !== false) {
            $partes = explode('-', $data);
            return $partes[2] . '/' . $partes[1] . '/' . $partes[0];
        }
        return $data;
    }

?>