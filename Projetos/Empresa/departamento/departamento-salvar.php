<body>
    <div class="container col-11 col-md-9" id="form-container">
        <div class="row gx-5">
            <div class="col-md-6">
                <h2>Realize o seu cadastro</h2>
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                        <label for="nome" class="form-label">Digite seu nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="datanascimento" name="datanascimento"
                               placeholder="Data de nascimento (dd/mm/yyyy)">
                        <label for="datanascimento" class="form-label">Data de nascimento (dd/mm/yyyy)</label>
                    </div>
                    <div class="form-floating mb-3">                        
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite seu endereço">
                        <label for="endereco" class="form-label">Digite seu endereço</label>
                    </div>
                    <!-- Selects -->
                    <div class="mb-4">
                        <select class="form-select">
                        <option selected>Selecione sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salario">Salário</label>
                        <input type="number" class="form-control" id="salario" step="0.01" placeholder="Digite seu salário">
                    </div>

                    
                    <div class="form-floating mb-3">                        
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                        <label for="email" class="form-label">Digite seu email</label>
                    </div>
                    <div class="form-floating mb-3">                        
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                        <label for="password" class="form-label">Digite sua senha</label>
                    </div>
                    <div class="form-floating mb-3">                        
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua senha">
                        <label for="confirmpassword" class="form-label">Confirme sua senha</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </form>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-12">
                        <img src="img/hello.svg" alt="Hello New Customer" class="img-fluid">
                    </div>
                    <div class="col-12" id="link-container">
                        <a href="home.php">Eu já tenho uma conta, voltar para a Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>