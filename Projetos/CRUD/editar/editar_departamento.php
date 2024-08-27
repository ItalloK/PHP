<h1>Editar Departamento</h1>

<?php
    $sql = "SELECT * FROM departamento WHERE Dnumero =" . $_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    $sql2 = "SELECT Dnumero, Dlocal FROM localizacao_dep";
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT Cpf, Nome FROM funcionario";
    $result3 = $conn->query($sql3);
?>

<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="editar_departamento">
    <input type="hidden" name="Dnumero" value="<?php print $row->Dnumero; ?>">

    <div class="mb-3">
        <label>Cpf Gerente</label>
        <select name="cpf_gerente" class="form-control" required>
            <option value="">Selecione o CPF do Funcionário</option>
            <?php
            if ($result3->num_rows > 0) {
                while($row3 = $result3->fetch_assoc()) {
                    echo "<option value='" . $row3["Cpf"] . "'>" . $row3["Nome"] . " - " . $row3["Cpf"] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum funcionário encontrado</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nome do Departamento</label>
        <input type="text" name="Nome_Departamento" value="<?php print $row->Dnome; ?>" class="form-control" maxlength="15" required>
    </div>
    <div class="mb-3">
        <label>Data de inicio do Gerente</label>
        <input type="date" name="Data_Inicio_Gerente" value="<?php print $row->Data_inicio_gerente; ?>" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Localização do Departamento</label>
        <select name="loc_departamento" class="form-control" required>
            <option value="">Selecione o local do Departamento</option>
            <?php
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    echo "<option value='" . $row2["Dnumero"] . "'>" . $row2["Dlocal"] . " - " . $row2["Dnumero"] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum local encontrado</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>