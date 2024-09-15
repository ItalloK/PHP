<?php
    include('protect.php');
    require('conexao.php');
    $numDepartamento = $_REQUEST["id"];
?>

<div class="card-header">
    <h4>Departamento</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome do Departamento</th>
                <th>Data de Inicio do Gerente</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM departamento WHERE NumDepartamento = {$numDepartamento}";
            $res = $conn->query($sql);
            $qtd = $res->num_rows;

            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
                    <tr>
                        <td><?=$row->NomeDepartamento?></td>
                        <td><?=date('d/m/Y', strtotime($row->DataInicioGerente))?></td>
                        <td>
                            <a href="?page=departamento-editar&id=<?=$row->NumDepartamento?>" class="btn btn-success btn-sm">
                                <span class="bi-pencil-fill"></span>
                                &nbsp;Editar
                            </a>
                            <form action="acoes.php" method="POST" class="d-inline">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                    type="submit" name="departamento_deletar" 
                                    value="<?=$row->NumDepartamento?>" class="btn btn-danger btn-sm">
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
                <a href="?page=projeto-listar">Voltar para os Projetos</a>
            </div>
        </div>
    </div>

</div>