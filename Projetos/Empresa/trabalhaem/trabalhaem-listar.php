<?php
    include('protect.php');
    require('conexao.php');
    $cpf = $_REQUEST["id"];
?>

<div class="card-header">
    <h4>
        Trabalha Em
        <a class="btn btn-primary" href="?page=trabalhaem-create&cpf=<?= urlencode($cpf) ?>">Novo Trabalho</a>
    </h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome do Projeto</th>
                <th>Horas de Trabalho</th>
                <th>Ação</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT 
                        dbempresa.funcionario.Cpf AS FuncionarioCpf,
                        dbempresa.funcionario.Nome AS FuncionarioNome,
                        dbempresa.trabalha_em.idTrabalhaEm,
                        dbempresa.trabalha_em.Horas,
                        dbempresa.projeto.Nome AS NomeProjeto,
                        dbempresa.projeto.Local AS LocalProjeto
                    FROM 
                        dbempresa.funcionario
                    INNER JOIN 
                        dbempresa.trabalha_em 
                    ON 
                        dbempresa.funcionario.Cpf = dbempresa.trabalha_em.fkCpf
                    INNER JOIN 
                        dbempresa.projeto
                    ON 
                        dbempresa.trabalha_em.fkIdProjeto = dbempresa.projeto.idProjeto
                    WHERE 
                        dbempresa.funcionario.Cpf = '{$cpf}'";
            $res = $conn->query($sql);
            $qtd = $res->num_rows;

            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
                    <tr>
                        <td><?=$row->NomeProjeto?></td>
                        <td><?=$row->Horas?></td>
                        <td>
                            <a href="?page=trabalhaem-editar&id=<?=$cpf?>" class="btn btn-success btn-sm">
                                <span class="bi-pencil-fill"></span>
                                &nbsp;Editar
                            </a>
                            <form action="acoes.php" method="POST" class="d-inline">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                    type="submit" name="delete_trabalhaem" 
                                    value="<?=$row->idTrabalhaEm?>" class="btn btn-danger btn-sm">
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
    <div class="col-md-6">
        <div class="row align-items-center">
            <div class="col-12" id="link-container">
                <a href="?page=funcionario-listar">Voltar para o Listar Funcionário</a>
            </div>
        </div>
    </div>

</div>