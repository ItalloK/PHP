<?php
  require('conexao.php');
?>
<html>
    <body>
        <div class="card-header">
            <h4>
                Departamentos 
                <a class="btn btn-primary" href="?page=departamento-create">Novo Departamento</a>
            </h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome do Departamento</th>
                        <th>Data do Inicio do Gerente</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    $sql = "SELECT * FROM departamento";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    
                    if($qtd > 0) {
                        while($row = $res->fetch_object()) {
                ?>
                            <tr>
                                <td><?=$row->NomeDepartamento?></td>
                                <td><?=date('d/m/Y', strtotime($row->DataInicioGerente))?></td>
                                <td>
                                    <a href="?page=departamento-editar&id=<?=$row->NumDepartamento?>" class="btn btn-sm btn-success">Editar</a>
                                    <form action="acoes.php" method="POST" class="d-inline">
                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                            type="submit" name="projeto_delete" 
                                            value="<?=$row->idProjeto?>" class="btn btn-danger btn-sm">
                                        <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nenhum projeto encontrado.</td></tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>
