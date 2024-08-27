<h1 style="display: inline-block;">Dependentes</h1>

<?php
    $sql = "SELECT * FROM dependente";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>Nome</th><th>Sexo</th><th>Data de Nascimento</th><th>Parentesco</th><th>Cpf Funcionario</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->Nome . "</td>";
            print "<td>" . $row->Sexo . "</td>";
            print "<td>" . convertData($row->Datanasc) . "</td>";
            print "<td>" . $row->Parentesco . "</td>";
            print "<td>" . $row->funcionario_Cpf . "</td>";
            print   "<td>
                        <button onclick=\"location.href='?page=editar_dependente&id=".$row->idDependente."';\" class='btn btn-warning'>Editar</button>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir_dependente&id=".$row->idDependente."';}else{false;}\" class='btn btn-danger'>Excluir</button>
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