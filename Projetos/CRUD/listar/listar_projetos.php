<h1 style="display: inline-block;">Projetos</h1>

<?php
    $sql = "SELECT * FROM projeto";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>Nº do Projeto</th><th>Nome Projeto</th><th>Local Projeto</th><th>Nº do Departamento</th><th>Ações</th></tr>";
        
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->Projnumero . "</td>";
            print "<td>" . $row->Projnome . "</td>";
            print "<td>" . $row->Projlocal . "</td>";
            print "<td>" . $row->Dnum . "</td>";
            print   "<td>
                        <button onclick=\"location.href='?page=editar_projetos&id=".$row->Projnumero."';\" class='btn btn-warning'>Editar</button>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir_projeto&id=".$row->Projnumero."';}else{false;}\" class='btn btn-danger'>Excluir</button>
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