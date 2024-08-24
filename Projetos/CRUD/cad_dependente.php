<h1>Cadastrar Dependente</h1>

<?php
    $sql = "SELECT Cpf, Nome FROM funcionario";
    $result = $conn->query($sql);
?>

<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="cadastrar_dependente">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" class="form-control" maxlength="80" required>
    </div>
    <div class="mb-3">
        <label>Sexo [M/F]</label>
        <input type="text" name="Sexo" class="form-control" maxlength="1" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="Datanasc" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Parentesco</label>
        <input type="text" name="Parentesco" class="form-control" maxlength="8" required>
    </div>
    </div>
    <div class="mb-3">
        <label>Cpf Funcionário</label>
        <select name="cpf_funcionario" class="form-control" required>
            <option value="">Selecione o CPF do Funcionário</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Cpf"] . "'>" . $row["Nome"] . " - " . $row["Cpf"] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum funcionário encontrado</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>