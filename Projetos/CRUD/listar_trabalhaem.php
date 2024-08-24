<h1 style="display: inline-block;">Onde Trabalha</h1>

<?php
    $sql = "SELECT * FROM trabalha_em";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID</th><th>CPF Funcionario</th><th>Nº do Projeto</th><th>Horas Trabalhadas</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->idTrabalhaEm . "</td>";
            print "<td>" . $row->Fcpf . "</td>";
            print "<td>" . $row->Pnr . "</td>";
            print "<td>" . $row->Horas . "</td>";
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