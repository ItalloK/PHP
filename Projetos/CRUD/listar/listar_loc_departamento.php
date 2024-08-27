<h1 style="display: inline-block;">Local Departamentos</h1>

<?php
    $sql = "SELECT * FROM localizacao_dep";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>Nº Local Departamento</th><th>Local Departamento</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->Dnumero . "</td>";
            print "<td>" . $row->Dlocal . "</td>";
            print   "<td>
                        <button onclick=\"location.href='?page=editar_localizar_dep&id=".$row->Dnumero."';\" class='btn btn-warning'>Editar</button>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir_localizar_dep&id=".$row->Dnumero."';}else{false;}\" class='btn btn-danger'>Excluir</button>
                    </td>";
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