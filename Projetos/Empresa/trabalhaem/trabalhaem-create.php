<?php
    require('conexao.php');
    $cpf = $_REQUEST["cpf"];
?>

<h2>Criar Trabalho</h2>

<form action="acoes.php" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Projeto">
        <label for="nome" class="form-label">Digite o nome do Projeto</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="local" name="local" placeholder="Digite o local do Projeto">
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
    <input type="submit" name="trabalhaem_create" class="btn btn-primary" value="Salvar">
    <input type="hidden" name="cpf" value="<?php print $cpf; ?>">
</form>

<div class="col-md-6 mt-3">
    <a href="?page=funcionario-listar">Voltar para o Listar Funcionário</a>
</div>
