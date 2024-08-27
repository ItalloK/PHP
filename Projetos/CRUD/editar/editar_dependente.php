<h1>Editar Dependente</h1>

<?php
    $sql = "SELECT * FROM dependente WHERE idDependente =" . $_REQUEST["id"] ;
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    $sql2 = "SELECT Cpf, Nome FROM funcionario";
    $res2 = $conn->query($sql2);
?>

<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="editar_dependente">
    <input type="hidden" name="idDependente" value="<?php print $row->idDependente; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" value="<?php print $row->Nome; ?>" class="form-control" maxlength="80" required>
    </div>
    <div class="mb-3">
        <label>Sexo [M/F]</label>
        <input type="text" name="Sexo" value="<?php print $row->Sexo; ?>" class="form-control" maxlength="1" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="Datanasc" value="<?php print $row->Datanasc; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Parentesco</label>
        <input type="text" name="Parentesco" value="<?php print $row->Parentesco; ?>" class="form-control" maxlength="8" required>
    </div>
    </div>
    <div class="mb-3">
        <label>Cpf Funcionário</label>
        <select name="cpf_funcionario" class="form-control" required>
            <option value="">Selecione o CPF do Funcionário</option>
            <?php
            if ($res2->num_rows > 0) {
                while ($row2 = $res2->fetch_assoc()) {
                    echo "<option value='" . $row2["Cpf"] . "'>" . $row2["Nome"] . " - " . $row2["Cpf"] . "</option>";
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