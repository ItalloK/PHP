<?php
    include('protect.php');
    require('conexao.php');
?>

<h2>Cadastro de Local de Departamentos</h2>

<form action="acoes.php" method="POST"> 
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o local do Departamento" maxlength="15" required>
        <label for="nome" class="form-label">Digite o local do Departamento</label>
    </div>

    <input type="submit" name="create_local_departamentos" class="btn btn-primary" value="Salvar">
    <div class="col-12" id="link-container">
</form>

<div class="col-md-6 mt-3">
    <div class="row align-items-center">
        <div class="col-12" id="link-container">
            <a href="?page=local_departamentos_listar">Voltar para o Listar os Locais de Departamentos</a>
        </div>
    </div>
</div>
