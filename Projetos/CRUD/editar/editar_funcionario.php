<h1>Editar Funcionario</h1>


<?php
    $sql = "SELECT * FROM funcionario WHERE Cpf =" . $_REQUEST["id"] ;
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>


<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="editar_funcionario">
    <input type="hidden" name="Cpf" value="<?php print $row->Cpf; ?>">

    <div class="mb-3">
        <label>CPF</label>
        <input type="number" name="Cpf" value="<?php print $row->Cpf; ?>" class="form-control" placeholder="Apenas numeros" maxlength="11" required readonly>
    </div>
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" value="<?php print $row->Nome; ?>" class="form-control" maxlength="80">
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="Datanasc" value="<?php print $row->Datanasc; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="Endereco" value="<?php print $row->Endereco; ?>" class="form-control" maxlength="30">
    </div>
    <div class="mb-3">
        <label>Sexo [M/F]</label>
        <input type="text" name="Sexo" value="<?php print $row->Sexo; ?>" class="form-control" maxlength="1">
    </div>
    <div class="mb-3">
        <label>Salario</label>
        <input type="number" name="Salario" value="<?php print $row->Salario; ?>" class="form-control" step="0.01" min="0" placeholder="0.00">
    </div>
        
    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>