<?php
  require('conexao.php');
?>

<div class="card-header">
    <h4>
        Lista dos Locais de Departamentos
        <a class="btn btn-primary" href="?page=local_departamentos_create">Novo Local de Departamento</a>
    </h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome Local</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM local_departamento";
            $res = $conn->query($sql);
            $qtd = $res->num_rows;

            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
                    <tr>
                        <td><?=$row->Nome?></td>
                        <td>
                            <a href="?page=local_departamentos_editar&id=<?=$row->idLocalDepartamento?>" class="btn btn-success btn-sm">
                                <span class="bi-pencil-fill"></span>
                                &nbsp;Editar
                            </a>
                            <form action="acoes.php" method="POST" class="d-inline">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                    type="submit" name="delete_local_departamentos" 
                                    value="<?=$row->idLocalDepartamento?>" class="btn btn-danger btn-sm">
                                <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
        <?php
                }
            }
        ?>
    </table>
</div>