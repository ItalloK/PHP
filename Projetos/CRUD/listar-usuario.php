<h1 style="display: inline-block;">Listar Usuarios</h1>

<form method="POST" id="filterForm" style="display: inline-block;">
    <select name="option" class="form-select" style="width: auto; display: inline-block; margin-left: 15px; vertical-align: 7px; padding-top: 2px;" onchange="document.getElementById('filterForm').submit();">
        <option selected>Escolha uma opção</option>
        <option value="1">Departamentos</option>
        <option value="2">Dependentes</option>
        <option value="3">Funcionarios</option>
        <option value="4">Localização Departamentos</option>
        <option value="5">Projetos</option>
        <option value="6">Trabalha Em...</option>
    </select>
</form>


<?php
// Verifica se uma opção foi selecionada
$option = isset($_POST['option']) ? $_POST['option'] : null;

// Chama a função correspondente à opção selecionada
switch ($option) {
    case '1':
        exibirDepartamentos($conn);
        break;
    case '2':
        exibirDependentes($conn);
        break;
    case '3':
        exibirFuncionarios($conn);
        break;
    case '4':
        exibirLocalizacaoDepartamentos($conn);
        break;
    case '5':
        exibirProjetos($conn);
        break;
    case '6':
        exibirTrabalhaEm($conn);
        break;
    default:
        exibirUsuarios($conn);
        break;
}

function exibirDepartamentos($conn) {
    $sql = "SELECT * FROM departamento";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>DNumero</th><th>Cpf_Gerente</th><th>Dnome</th><th>Data inicio Gerente</th><th>Loc Departamento</th></tr>";
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
}

function exibirDependentes($conn) {
    $sql = "SELECT * FROM dependentes";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID</th><th>Nome</th><th>ID Funcionário</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . $row->funcionario_id . "</td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
}

function exibirFuncionarios($conn) {
    $sql = "SELECT * FROM funcionarios";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Data de Nascimento</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . $row->email . "</td>";
            print "<td>" . convertData($row->data_nascimento) . "</td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
}

function exibirLocalizacaoDepartamentos($conn) {
    $sql = "SELECT * FROM localizacao_departamentos";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID</th><th>Departamento</th><th>Localização</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->departamento_id . "</td>";
            print "<td>" . $row->localizacao . "</td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
}

function exibirProjetos($conn) {
    $sql = "SELECT * FROM projetos";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID</th><th>Nome</th><th>Departamento</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . $row->departamento_id . "</td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
}

function exibirTrabalhaEm($conn) {
    $sql = "SELECT * FROM trabalha_em";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID Funcionário</th><th>ID Projeto</th><th>Horas</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->funcionario_id . "</td>";
            print "<td>" . $row->projeto_id . "</td>";
            print "<td>" . $row->horas . "</td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
}

function exibirUsuarios($conn) {
    $sql = "SELECT * FROM usuarios";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Data de Nascimento</th><th>Ações</th></tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . $row->email . "</td>";
            print "<td>" . convertData($row->data_nascimento) . "</td>";
            print "<td>
                    <button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" class='btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja deletar este usuario?')){location.href='?page=salvar&acao=excluir&id=" . $row->id . "';}else{false;}\" class='btn-danger'>Excluir</button>
                   </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
}

function convertData($data) {
    if (!empty($data) && strpos($data, '-') !== false) {
        $partes = explode('-', $data);
        return $partes[2] . '/' . $partes[1] . '/' . $partes[0];
    }
    return $data;
}
?>

