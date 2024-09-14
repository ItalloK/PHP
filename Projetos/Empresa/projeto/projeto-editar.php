<?php 
    require('conexao.php');

    $id = $_REQUEST['id'];
    $sql2 = "SELECT Nome, Local, fkNumDepartamento FROM projeto WHERE idProjeto = {$id}";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_object();
    
?>

<h2>Editar Projeto</h2>

<form action="acoes.php" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Projeto" value="<?php print($row2->Nome) ?>">
        <label for="nome" class="form-label">Digite o nome do Projeto</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="local" name="local" placeholder="Digite o local do Projeto" value="<?php print($row2->Local) ?>">
        <label for="local" class="form-label">Digite o local do Projeto</label>
    </div>
    <div class="mb-3">
        <select name="num-departamento" class="form-control" required>
            <option value="" disabled selected hidden>Selecione o Departamento</option>
            <?php
            $sql = "SELECT NumDepartamento, NomeDepartamento FROM departamento";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row["NumDepartamento"]) . "'>" . htmlspecialchars($row["NomeDepartamento"]) . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum departamento encontrado</option>";
            }
            ?>
        </select>
    </div>

    <input type="submit" name="projeto_edit" class="btn btn-primary" value="Salvar">
    <input type="hidden" name="idProjeto" value="<?php echo $id; ?>">
</form>

<div class="col-md-6 mt-3">
    <a href="?page=projeto-listar">Voltar para o Listar Projetos</a>
</div>
