<?php
    include('protect.php');
    require('conexao.php');

    $sql = "SELECT * FROM funcionario WHERE Cpf = '".$_REQUEST["id"]."'";
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<h2>Atualize o seu cadastro</h2>
<form action="acoes.php" method="POST">
    <div class="container">
        <input type="hidden" name="id" value="<?=$row->Cpf?>">
        <div class="form-group mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" 
                placeholder="CPF" aria-label="Cpf" disabled
                value="<?=$row->Cpf?>">
        </div>
        <div class="form-group mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" 
                placeholder="Digite seu nome" value="<?=$row->Nome?>" maxlength="80" required>
        </div>
        <div class="form-group mb-3">
            <label for="datanascimento" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="datanascimento" name="datanascimento"
                value="<?=$row->DataNascimento?>">
        </div>
        <div class="form-group mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" 
                placeholder="Digite seu endereço" value="<?=$row->Endereco?>" maxlength="80" required>
        </div>
        <div class="form-group mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo">
                <option selected>Selecione sexo</option>
                <option value="M" <?php if($row->Sexo == "M"){echo("selected");}; ?>>Masculino</option>
                <option value="F" <?php if($row->Sexo == "F"){echo("selected");}; ?>>Feminino</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="salario" class="form-label">Salário</label>
            <input type="number" class="form-control" id="salario" name="salario" 
                placeholder="Digite seu salário" value="<?=$row->Salario?>">
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
                placeholder="Digite seu email" value="<?=$row->Email?>" maxlength="80" required>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" maxlength="255" required>
        </div>
        <div class="form-group mb-3">
            <label for="confirmpassword" class="form-label">Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua senha">
        </div>
        <button type="submit" class="btn btn-primary" name="edit_funcionario">Salvar</button>
    </div>
</form>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <a href="?page=funcionario-listar" class="btn btn-link">Voltar para o Listar Funcionário</a>
        </div>
    </div>
</div>
