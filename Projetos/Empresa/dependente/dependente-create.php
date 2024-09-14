<?php
  require('conexao.php');

  $cpf = $_REQUEST["id"];
?>

<h2>Cadastro de Dependente</h2>

<form action="acoes.php" method="POST"> 
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
        <label for="nome" class="form-label">Digite seu nome</label>
    </div>

    <div class="mb-3">
        <select class="form-select" id="sexo" name="sexo">
            <option selected>Selecione sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="Data de nascimento (dd/mm/yyyy)">
        <label for="datanascimento" class="form-label">Data de nascimento (dd/mm/yyyy)</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="parentesco" name="parentesco" placeholder="Digite o grau de parentesco">
        <label for="parentesco" class="form-label">Digite o grau de parentesco:</label>
    </div>

    <input type="submit" name="create_dependente" class="btn btn-primary" value="Salvar">
    <div class="col-12" id="link-container">
</form>

<div class="col-md-6 mt-3">
    <div class="row align-items-center">
        <div class="col-12" id="link-container">
            <a href="?page=funcionario-listar">Voltar para o Listar Funcionário</a>
        </div>
    </div>
</div>
