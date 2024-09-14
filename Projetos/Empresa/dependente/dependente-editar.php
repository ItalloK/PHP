<?php
  require('conexao.php');

  $sql = "SELECT * FROM dependente WHERE iddependente = '".$_REQUEST["id"]."'";
  $res = $conn->query($sql);
  $row = $res->fetch_object();

?>

<h2>Ediar Dependente</h2>

<form action="acoes.php" method="POST"> 
    <input type="hidden" name="iddependente" value="<?php print $row->iddependente; ?>">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" value="<?=$row->Nome?>" maxlength="80" require>
        <label for="nome" class="form-label">Digite seu nome</label>
    </div>

    <div class="mb-3">
        <select class="form-select" id="sexo" name="sexo">
            <option value="" disabled selected>Selecione sexo</option>
            <option value="M" <?= $row->Sexo == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $row->Sexo == 'F' ? 'selected' : '' ?>>Feminino</option>
        </select>
    </div>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="Data de nascimento (dd/mm/yyyy)" value="<?=$row->Datanasc?>">
        <label for="datanascimento" class="form-label">Data de nascimento (dd/mm/yyyy)</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="parentesco" name="parentesco" placeholder="Digite o grau de parentesco" value="<?=$row->Parentesco?>" maxlength="8" require>
        <label for="parentesco" class="form-label">Digite o grau de parentesco:</label>
    </div>

    <input type="submit" name="edit_dependente" class="btn btn-primary" value="Salvar">
    <div class="col-12" id="link-container">
</form>

<div class="col-md-6 mt-3">
    <div class="row align-items-center">
        <div class="col-12" id="link-container">
            <a href="?page=funcionario-listar">Voltar para o Listar Funcionário</a>
        </div>
    </div>
</div>