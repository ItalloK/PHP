<h1>Cadastrar Projeto</h1>

<?php
    $sql = "SELECT Dnumero, Dnome FROM departamento";
    $result = $conn->query($sql);
?>

<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="cadastrar_projeto">
    <div class="mb-3">
        <label>Nome do Projeto</label>
        <input type="text" name="proj_nome" class="form-control" maxlength="15" required>
    </div>
    <div class="mb-3">
        <label>Local do Projeto</label>
        <input type="text" name="proj_local" class="form-control" maxlength="15" required>
    </div>
    </div>
    <div class="mb-3">
    <label>Departamento</label>
        <select name="departamento" class="form-control" required>
            <option value="">Selecione o Departamento</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Dnumero"] . "'>" . $row["Dnome"] . " - " . $row["Dnumero"] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum departamento encontrado</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>