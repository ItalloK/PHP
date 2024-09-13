<?php
  require('conexao.php');
?>
<html>
    <body>
        <div class="card-header">
            <h4>
                Projetos 
                <a class="btn btn-primary" href="projeto-salvar.php">Novo Projeto</a>
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
                    $sql = "SELECT Nome, Local, fkNumDepartamento FROM projeto";
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
                                    <a href="projeto-editar.php?id=<?=$row->id?>" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                    <form action="projeto-excluir.php" method="POST" class="d-inline">
                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                            type="submit" name="delete_projeto" 
                                            value="<?=$row->id?>" class="btn btn-sm btn-danger">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                <?php
                        }
                    } else {
                        // Optionally, show a message if no results are found
                        echo "<tr><td colspan='4'>Nenhum projeto encontrado.</td></tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>
