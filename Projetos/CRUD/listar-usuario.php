<h1 style="display: inline-block;">Listar Usuarios</h1>

<select class="form-select" style="width: auto; display: inline-block; margin-left: 15px; vertical-align: 7px; padding-top: 2px;">
    <option selected>Escolha uma opção</option>
    <option value="1">Departamentos</option>
    <option value="2">Dependentes</option>
    <option value="3">Funcionarios</option>
    <option value="4">Localização Departamentos</option>
    <option value="5">Projetos</option>
    <option value="6">Trabalha Em...</option>
</select>


<?php

    $sql = "SELECT * FROM usuarios";

    $res = $conn -> query($sql);

    $qtd = $res -> num_rows;

    if($qtd > 0){
        print "<table class = 'table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>Email</th>";
            print "<th>Data de Nascimento</th>";
            print "<th>Ações</th>";
            print "</tr>";  
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".convertData($row->data_nascimento)."</td>";
            print   "<td>
                        <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn-success'>Editar</button>


                        <button onclick=\"if(confirm('Tem certeza que deseja deletar este usuario?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='btn-danger'>Excluir</button>
                    </td>";
            print "</tr>";
        }
        print "</table>";
    }else{
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