<?php
  require('conexao.php');
?>
<html>
    <body>
        <div class="card-header">
            <h4>
                Projetos 
                <a class="btn btn-primary" href="?page=projeto-create">Novo Projeto</a>
            </h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Local</th>
                        <th>Número do Departamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    $sql = "SELECT * FROM projeto";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    
                    if($qtd > 0) {
                        while($row = $res->fetch_object()) {
                ?>
                            <tr>
                                <td><?=$row->Nome?></td>
                                <td><?=$row->Local?></td>
                                <td><?=$row->fkNumDepartamento?></td>
                                <td>
                                    <a href="?page=projeto-editar&id=<?=$row->idProjeto?>" class="btn btn-sm btn-success">Editar</a>
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
