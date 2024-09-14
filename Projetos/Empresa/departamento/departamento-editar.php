<?php
    require('conexao.php');

    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM funcionario";
    $result = $conn->query($sql);

    $sql2 = "SELECT * FROM departamento WHERE NumDepartamento = {$id}";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_object();

    $sql3 = "SELECT * FROM local_departamento";
    $result3 = $conn->query($sql3);
?>

<h2>Editar Departamento</h2>

<form action="acoes.php" method="POST"> 
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="local" name="local" placeholder="Digite o local do Departamento" value="<?=$row2->NomeDepartamento?>" maxlength="15" require>
        <label for="local" class="form-label">Digite o nome do Departamento</label>
    </div>

    <div class="mb-3">
        <select name="cpfGerente" class="form-control" required>
            <option value="" disabled selected hidden>Selecione o Gerente</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Cpf"] . "'>" . $row["Nome"]. "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum funcionario encontrado</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <select name="localdepartamento" class="form-control" required>
            <option value="" disabled selected hidden>Selecione o local do Departamento</option>
            <?php
            if ($result3->num_rows > 0) {
                while($row = $result3->fetch_assoc()) {
                    echo "<option value='" . $row["idLocalDepartamento"] . "'>" . $row["Nome"]. "</option>";
                }
            } else {
                echo "<option value='' disabled>Nenhum local de Departamento encontrado</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="datainicio" name="datainicio" placeholder="Data de nascimento (dd/mm/yyyy)" value="<?=$row2->DataInicioGerente?>">
        <label for="datainicio" class="form-label">Data de inicio do gerente (dd/mm/yyyy)</label>
    </div>

    <input type="submit" name="departamento_editar" class="btn btn-primary" value="Salvar">
    <input type="hidden" name="id" value="<?php echo $row2->NumDepartamento; ?>">
    <div class="col-12" id="link-container">
</form>

<div class="col-md-6 mt-3">
    <div class="row align-items-center">
        <div class="col-12" id="link-container">
            <a href="?page=departamento-listartodos">Voltar para o Listar os Departamentos</a>
        </div>
    </div>
</div>
