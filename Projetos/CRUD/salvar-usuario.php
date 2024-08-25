<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nascimento = $_POST["data_nascimento"];

            $sql = "INSERT INTO usuarios(nome, email, senha, data_nascimento) 
                VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nascimento}') ";

            $res = $conn -> query($sql);

            if($res == true){
                print "<script>alert('Cadastro com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;
        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nascimento = $_POST["data_nascimento"];

            $sql = "UPDATE usuarios SET 
                        nome = '{$nome}',
                        email = '{$email}', 
                        senha = '{$senha}', 
                        data_nascimento = '{$data_nascimento}' 
                    WHERE 
                        id=".$_REQUEST["id"];

            $res = $conn -> query($sql);
            if($res == true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel editar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        case 'cadastrar_funcionario':
            try {
                $conn->report_mode = MYSQLI_REPORT_ALL;

                $cpf = $_POST["Cpf"];
                $nome = $_POST["Nome"];
                $data_nascimento = $_POST["Datanasc"];
                $endereco = $_POST["Endereco"];
                $sexo = $_POST["Sexo"];
                $salario = $_POST["Salario"];
            
                $sql = "INSERT INTO funcionario (Cpf, Nome, Datanasc, Endereco, Sexo, Salario) 
                        VALUES ('{$cpf}', '{$nome}', '{$data_nascimento}', '{$endereco}', '{$sexo}', {$salario})";
            
                $res = $conn->query($sql);
            
                if ($res) {
                    print "<script>alert('Cadastro realizado com sucesso');</script>";
                    print "<script>location.href='?page=index.php';</script>";
                }
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    echo "<script>alert('Erro: CPF já cadastrado. Por favor, use um CPF diferente.');</script>";
                } else {
                    echo "<script>alert('Erro: Não foi possível realizar o cadastro. Verifique os dados e tente novamente.');</script>";
                }
                print "<script>location.href='?page=index.php';</script>";
            }
        case 'cadastrar_dependente':
            $nome = $_POST["Nome"];
            $sexo = $_POST["Sexo"];
            $data_nascimento = $_POST["Datanasc"];
            $parentesco = $_POST["Parentesco"];
            $cpf_funcionaro = $_POST["cpf_funcionario"];
        
            $sql = "INSERT INTO dependente (Nome, Sexo, Datanasc, Parentesco, funcionario_Cpf) 
                    VALUES ('{$nome}', '{$sexo}', '{$data_nascimento}', '{$parentesco}', '{$cpf_funcionaro}')";
        
            $res = $conn->query($sql);
    
            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        
        case 'cadastrar_local_departamento':
            $dlocal = $_POST["Dlocal"];
        
            $sql = "INSERT INTO localizacao_dep (Dlocal) 
                    VALUES ('{$dlocal}')";
        
            $res = $conn->query($sql);
    
            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        
        case 'cadastrar_departamento':
            $cpf_funcionario = $_POST["cpf_funcionario"];
            $Nome_Departamento = $_POST["Nome_Departamento"];
            $Data_Inicio_Gerente = $_POST["Data_Inicio_Gerente"];
            $loc_departamento = $_POST["loc_departamento"];
        
            $sql = "INSERT INTO departamento (Cpf_gerente, Dnome, Data_inicio_gerente, LocDepartamento) 
                    VALUES ('{$cpf_funcionario}', '{$Nome_Departamento}', '{$Data_Inicio_Gerente}', '{$loc_departamento}')";
        
            $res = $conn->query($sql);
    
            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'cadastrar_projeto':
            $proj_nome = $_POST["proj_nome"];
            $proj_local = $_POST["proj_local"];
            $departamento = $_POST["departamento"];
        
            $sql = "INSERT INTO projeto (Projnome, Projlocal, Dnum) 
                    VALUES ('{$proj_nome}', '{$proj_local}', {$departamento})";
        
            $res = $conn->query($sql);
    
            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'cadastrar_trabalha_em':
            $funcionario = $_POST["funcionario"];
            $projeto = $_POST["projeto"];
            $horas_trabalhadas = $_POST["horas_trabalhadas"];
        
            $sql = "INSERT INTO trabalha_em (Fcpf, Pnr, Horas) 
                    VALUES ('{$funcionario}', '{$projeto}', {$horas_trabalhadas})";
        
            $res = $conn->query($sql);
    
            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'editar_projeto':
            $Projnome = $_POST["Projnome"];
            $Projlocal = $_POST["Projlocal"];
            $departamento = $_POST["departamento"];

            $sql = "UPDATE projeto SET 
                        Projnome = '{$Projnome}',
                        Projlocal = '{$Projlocal}',
                        Dnum = {$departamento} 
                    WHERE 
                        Projnumero=".$_REQUEST["Projnumero"];

            $res = $conn -> query($sql);
            if($res == true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel editar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        case 'excluir_projeto':
            $sql = "DELETE FROM projeto WHERE Projnumero =".$_REQUEST["id"];
            $res = $conn -> query($sql);
            if($res == true){
                print "<script>alert('Deletado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel deletar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
    }

?>