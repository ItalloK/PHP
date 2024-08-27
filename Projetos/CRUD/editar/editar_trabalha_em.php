<h1>Editar Trabalha Em</h1>

<?php
    $sql = "SELECT Cpf, Nome FROM funcionario";
    $result = $conn->query($sql);
    $sql2 = "SELECT Projnumero, Projnome FROM projeto";
    $result2 = $conn->query($sql2);
    
    $sql3 = "SELECT * FROM trabalha_em WHERE idTrabalhaEm = ". $_REQUEST["id"];
    $res = $conn->query($sql3);
    $row4 = $res->fetch_object();
?>


<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar_trabalha_em">
    <input type="hidden" name="idTrabalhaEm" value="<?php print $row4->idTrabalhaEm; ?>">

    <div class="mb-3">
        <label>Projeto</label>
        <select name="funcionario" class="form-control" required>
            <option value="">Selecione o Funcionário</option>
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
        <label>Projeto</label>
        <select name="projeto" class="form-control" required>
            <option value="">Selecione o Projeto</option>
            <?php
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    echo "<option value='" . $row2["Projnumero"] . "'>" . $row2["Projnome"] . " - " . $row2["Projnumero"] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum projeto encontrado</option>";
            }
            ?>
        </select>
    </div>


    <div class="mb-3">
        <label>Horas Trabalhadas</label>
        <input type="number" name="horas_trabalhadas" value="<?php print $row4->Horas; ?>" class="form-control" step="0.01" min="0" placeholder="0.00">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>