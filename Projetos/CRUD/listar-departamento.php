<h1 style="display: inline-block;">Departamentos</h1>

<?php

    $sql = "SELECT * FROM departamento";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>Nº Departamento</th>
                <th>CPF Gerente</th><th>Nome Departamento</th>
                <th>Data inicio Gerente</th><th>Localização Departamento</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->Dnumero . "</td>";
            print "<td>" . $row->Cpf_gerente . "</td>";
            print "<td>" . $row->Dnome . "</td>";
            print "<td>" . convertData($row->Data_inicio_gerente) . "</td>";
            print "<td>" . $row->LocDepartamento . "</td>";
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