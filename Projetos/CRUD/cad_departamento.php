<h1>Cadastrar Departamento</h1>

<?php
    $sql = "SELECT Cpf, Nome FROM funcionario";
    $result = $conn->query($sql);

    $sql2 = "SELECT Dnumero, Dlocal FROM localizacao_dep";
    $result2 = $conn->query($sql2);
?>

<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="cadastrar_departamento">

    <div class="mb-3">
        <label>Cpf Gerente</label>
        <select name="cpf_funcionario" class="form-control" required>
            <option value="">Selecione o CPF do Funcionário</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Cpf"] . "'>" . $row["Nome"] . " - " . $row["Cpf"] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum funcionário encontrado</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nome do Departamento</label>
        <input type="text" name="Nome_Departamento" class="form-control" maxlength="15" required>
    </div>
    <div class="mb-3">
        <label>Data de inicio do Gerente</label>
        <input type="date" name="Data_Inicio_Gerente" class="form-control" required>
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