<body>
    <div class="container col-11 col-md-9" id="form-container">
        <div class="row align-items-center gx-5">
            <div class="col-md-6 order-md-2">

                <div>
                    <h4>
                        Departamento
                        <a class="btn btn-primary" href="departamento-salvar.php">Novo Departamento</a>
                    </h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data Nascimento</th>
                                <th>Sexo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <?php
                            $sql = "Select * from funcionario";

                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;

                            if($qtd > 0){
                                while($row = $res->fetch_object()){
                                    print "<tr >";
                                    print "<td >".$row->nome."</td>";
                                    print "<td >".$row->datanascimento."</td>";
                                    print "<td >".$row->sexo."</td>";
                                    print "<td>";
                                    print "<a class='btn btn-sm btn-info'>Editar</a>";
                                    print "<a class='btn btn-sm btn-danger'>Excluir</a>";
                                    print "</td>";
                                    print "</tr>";
                                }
                            }
                                
                        ?>
                    </table>
                </div>

                <a class="btn btn-primary">Novo Paciente</a>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="col-12">
                    <img src="/empresa/img/list_paciente.avif" alt="Hello New Customer" class="img-fluid">
                </div>
                <div class="col-12" id="link-container">
                    <a href="/empresa/home.php">Voltar a home</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div>
            <div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign"></span>
                0 funcionário cadastrado!
            </div>
        </div>
        <hr/>
        <footer class="footer">
            <p>&copy; 2024 Prof. Edilson Lima</p>
        </footer>

    </div>
</body>