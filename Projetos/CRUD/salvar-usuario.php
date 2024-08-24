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
        case 'excluir':
            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];
            $res = $conn -> query($sql);
            if($res == true){
                print "<script>alert('Deletado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel deletar');</script>";
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
                print "<script>alert('Deletado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel deletar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
    }

?>