<?php
    include('protect.php');
    require('conexao.php');
?>
<div class="card-header">
    <h4>
        Lista de Funcionários
        <a class="btn btn-primary" href="?page=funcionario-create">Novo Funcionário</a>
    </h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Nascimento</th>
                <th>Sexo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <?php
            $sql = "Select * from funcionario order by Nome";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
                    <tr>
                        <td><?=$row->Nome?></td>
                        <td><?=date('d/m/Y', strtotime($row->DataNascimento))?></td>
                        <td><?=$row->Sexo?></td>
                        <td>
                            <a href="?page=dependente-listar&id=<?=$row->Cpf?>" class="btn btn-secondary btn-sm">
                                <span class="bi-eye-fill"></span>
                                &nbsp;Dependente
                            </a>
                            <a href="?page=trabalhaem-listar&id=<?=$row->Cpf?>" class="btn btn-warning btn-sm">
                                <span class="bi-eye-fill"></span>
                                &nbsp;Trabalha Em
                            </a>
                            <a href="?page=funcionario-editar&id=<?=$row->Cpf?>" class="btn btn-success btn-sm">
                                <span class="bi-pencil-fill"></span>
                                &nbsp;Editar
                            </a>
                            <form action="acoes.php" method="POST" class="d-inline">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                    type="submit" name="delete_funcionario" 
                                    value="<?=$row->Cpf?>" class="btn btn-danger btn-sm">
                                <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum funcionario encontrado.</td></tr>";
            }
        ?>
    </table>
</div>