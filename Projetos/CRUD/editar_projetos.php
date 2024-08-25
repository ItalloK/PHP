<h1>Editar Projetos</h1>

<?php
    $sql = "SELECT * FROM projeto WHERE Projnumero =" . $_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    $sql2 = "SELECT Dnumero, Dnome FROM departamento";
    $res2 = $conn->query($sql2);
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar_projeto">
    <input type="hidden" name="Projnumero" value="<?php print $row->Projnumero; ?>">

    <div class="mb-3">
        <label>Nome do Projeto</label>
        <input type="text" name="Projnome" value="<?php print $row->Projnome; ?>" class="form-control" maxlength="15" required>
    </div>

    <div class="mb-3">
        <label>Local Projeto</label>
        <input type="text" name="Projlocal" value="<?php print $row->Projlocal; ?>" class="form-control" maxlength="15" required>
    </div>

    <div class="mb-3">
        <label>Departamento</label>
        <select name="departamento" class="form-control" required>
            <option value="">Selecione o Departamento</option>
            <?php
            if ($res2->num_rows > 0) {
                while ($row2 = $res2->fetch_assoc()) {
                    echo "<option value='" . $row2["Dnumero"] . "'>" . $row2["Dnome"] . " - " . $row2["Dnumero"] . "</option>";
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
