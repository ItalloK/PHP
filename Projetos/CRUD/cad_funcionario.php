<h1>Cadastrar Funcionario</h1>
<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="cadastrar_funcionario">
    <div class="mb-3">
        <label>CPF</label>
        <input type="number" name="Cpf" class="form-control" placeholder="Apenas numeros" maxlength="11" required>
    </div>
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" class="form-control" maxlength="80">
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="Datanasc" class="form-control">
    </div>
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="Endereco" class="form-control" maxlength="30">
    </div>
    <div class="mb-3">
        <label>Sexo [M/F]</label>
        <input type="text" name="Sexo" class="form-control" maxlength="1">
    </div>
    <div class="mb-3">
        <label>Valor</label>
        <input type="number" name="Salario" class="form-control" step="0.01" min="0" placeholder="0.00">
    </div>
        
    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>