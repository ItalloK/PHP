<?php 
    require('conexao.php');
    $sql = "SELECT NumDepartamento , NomeDepartamento FROM departamento";
    $result = $conn->query($sql);
?>

<h2>Criar Projeto</h2>

<form action="acoes.php" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Projeto" maxlength="15" require>
        <label for="nome" class="form-label">Digite o nome do Projeto</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="local" name="local" placeholder="Digite o local do Projeto" maxlength="15" require>
        <label for="local" class="form-label">Digite o local do Projeto</label>
    </div>
    <div class="mb-3">
        <select name="num-projeto" class="form-control" required>
            <option value="" disabled selected hidden>Selecione o Departamento</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["NumDepartamento"] . "'>" . $row["NomeDepartamento"]. "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum projeto encontrado</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" name="projeto_create" class="btn btn-primary" value="Salvar">
</form>

<div class="col-md-6 mt-3">
    <a href="?page=projeto-listar">Voltar para o Listar Projetos</a>
</div>
