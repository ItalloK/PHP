<?php
    include('protect.php');
	session_start();
	require 'conexao.php';

###################################### FUNCIONARIO  ######################################
	if (isset($_POST['create_funcionario'])) {
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$datanascimento = $_POST['datanascimento'];
		$endereco = $_POST['endereco'];
		$sexo = $_POST['sexo'];
		$salario = $_POST['salario'];
		$email = $_POST['email'];
		$senha = md5($_POST['password']);
		
		## Verificação de CPF ##
		$sql = "SELECT Cpf FROM funcionario WHERE Cpf = {$cpf}";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) {
			echo "<script>alert('O CPF ja está em USO.');</script>";
			echo "<script>location.href='home.php?page=funcionario-listar';</script>";
			exit;
		}
		## Verificação de CPF ##

		$sql = "INSERT INTO funcionario 
					(Cpf, Nome, DataNascimento, Endereco, Sexo, Salario, Email, Senha) 
				VALUES ('{$cpf}', '{$nome}', '{$datanascimento}', 
					'{$endereco}', '{$sexo}', '{$salario}', '{$email}', '{$senha}')";
		
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possível cadastrar o funcionário');</script>";
			print "<script>location.href='?page=funcionario-create';</script>";
		}
		exit;
		
	}

	if (isset($_POST['edit_funcionario'])) {
		$cpf = $_POST['id'];
		$nome = $_POST['nome'];
		$datanascimento = $_POST['datanascimento'];
		$endereco = $_POST['email'];
		$sexo = $_POST['sexo'];
		$salario = $_POST['salario'];
		$email = $_POST['email'];
		$senha = md5($_POST['password']);

		$sql = "UPDATE funcionario SET 
					Nome = '{$nome}', 
					DataNascimento = '{$datanascimento}',
					Endereco = '{$endereco}', 
					Sexo = '{$sexo}', 
					Salario = '{$salario}', 
					Email = '{$email}', 
					Senha = '{$senha}' 
				WHERE Cpf = '{$cpf}';";
		
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possível editar o cadastro do funcionário');</script>";
			print "<script>location.href='?page=funcionario-edit';</script>";
		}
		exit;
	}

	if (isset($_POST['delete_funcionario'])) {
		$cpf = $_POST['delete_funcionario'];
	
		$sql = "SELECT * FROM dependente WHERE fkCpf = '{$cpf}';";
		$res = $conn->query($sql);
	
		if ($res->num_rows > 0) {
			echo "<script>alert('O Funcionário possui dependente, não é possível excluir o cadastrado.');</script>";
			echo "<script>location.href='home.php?page=funcionario-listar';</script>";
			exit;
		}
	
		$sql = "SELECT * FROM trabalha_em WHERE fkCpf = '{$cpf}';";
		$res = $conn->query($sql);
	
		if ($res->num_rows > 0) {
			echo "<script>alert('O Funcionário está vinculado em um trabalho, não é possível excluir o funcionario.');</script>";
			echo "<script>location.href='home.php?page=funcionario-listar';</script>";
			exit;
		}
		$sql = "DELETE FROM funcionario WHERE Cpf = '{$cpf}'";
		$res = $conn->query($sql);
		if ($res === TRUE) {
			header('Location: home.php?page=funcionario-listar');
			exit;
		} else {
			echo "<script>alert('Não foi possível excluir o cadastrado do funcionário.');</script>";
			echo "<script>location.href='home.php?page=funcionario-listar';</script>";
			exit;
		}
	}
###################################### FUNCIONARIO  ######################################


###################################### DEPENDENTE  ######################################
	if (isset($_POST['create_dependente'])) {
		$fkCpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$sexo = $_POST['sexo'];
		$datanasc = $_POST['datanascimento'];
		$parentesco = $_POST['parentesco'];
		

		$sql = "INSERT INTO dependente (Nome, Sexo, Datanasc, Parentesco, fkCpf) VALUES ('{$nome}', '{$sexo}', '{$datanasc}', '{$parentesco}', '{$fkCpf}')";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possível cadastrar o dependente');</script>";
			print "<script>location.href='?page=dependente-create';</script>";
		}
		exit;
	}

	if (isset($_POST['edit_dependente'])) {
		$idDependente = $_POST['iddependente'];
		$nome = $_POST['nome'];
		$sexo = $_POST['sexo'];
		$datanasc = $_POST['datanascimento'];
		$parentesco = $_POST['parentesco'];
		
		$sql = "UPDATE dependente SET Nome = '{$nome}', Sexo = '{$sexo}', Datanasc = '{$datanasc}', Parentesco = '{$parentesco}' WHERE iddependente = {$idDependente}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possível cadastrar o dependente');</script>";
			print "<script>location.href='?page=funcionario-listar';</script>";
		}
		exit;
	}

	if (isset($_POST['delete_dependente'])) {
		$idDependente = $_POST['delete_dependente'];
		
		$sql = "DELETE FROM dependente WHERE iddependente = {$idDependente}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possível deletar o dependente');</script>";
			print "<script>location.href='?page=funcionario-listar';</script>";
		}
		exit;
	}
###################################### DEPENDENTE  ######################################

###################################### LOCAIS DEPARTAMENTO  ######################################

	if (isset($_POST['create_local_departamentos'])) {
		$local = $_POST['nome'];
		$sql = "INSERT INTO local_departamento (Nome) VALUES ('{$local}')";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=local_departamentos_listar');
		} else {
			print "<script>alert('Não foi possível cadastrar o local');</script>";
			print "<script>location.href='?page=local_departamentos_listar';</script>";
		}
		exit;
	}

	if (isset($_POST['delete_local_departamentos'])) {
		$id = $_POST['delete_local_departamentos'];

		$sql = "SELECT fkidLocalDepartamento FROM departamento WHERE fkidLocalDepartamento = {$id}";
		$res = $conn->query($sql);
	
		if ($res->num_rows > 0) {
			echo "<script>alert('O local está vinculado a um departamento e não é possivel deletar.');</script>";
			echo "<script>location.href='home.php?page=local_departamentos_listar';</script>";
			exit;
		}

		$sql = "DELETE FROM local_departamento WHERE idLocalDepartamento = {$id}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=local_departamentos_listar');
		} else {
			print "<script>alert('Não foi possível deletar o local');</script>";
			print "<script>location.href='?page=local_departamentos_listar';</script>";
		}
		exit;
	}


	if (isset($_POST['editar_local_departamentos'])) {
		$local = $_POST['nome'];
		$id = $_POST['idLocal'];
		$sql = "UPDATE local_departamento SET Nome = '{$local}' WHERE idLocalDepartamento = {$id}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=local_departamentos_listar');
		} else {
			print "<script>alert('Não foi possível atualizar o local');</script>";
			print "<script>location.href='?page=local_departamentos_listar';</script>";
		}
		exit;
	}

###################################### LOCAIS DEPARTAMENTO  ######################################


###################################### PROJETO  ######################################

	if (isset($_POST['projeto_create'])) {
		$nome = $_POST['nome'];
		$local = $_POST['local'];
		$numProjeto = $_POST['num-projeto'];
		$sql = "INSERT INTO projeto (Nome, Local, fkNumDepartamento) VALUES ('{$nome}', '{$local}', {$numProjeto})";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=projeto-listar');
		} else {
			print "<script>alert('Não foi possível criar o projeto');</script>";
			print "<script>location.href='?page=projeto-listar';</script>";
		}
		exit;
	}

	if (isset($_POST['projeto_delete'])) {
		$idProjeto = $_POST['projeto_delete'];

		$sql = "SELECT idTrabalhaEm FROM trabalha_em WHERE fkIdProjeto = {$idProjeto}";
		$res = $conn->query($sql);
	
		if ($res->num_rows > 0) {
			echo "<script>alert('O local está vinculado a um trabalho e não é possivel deletar.');</script>";
			echo "<script>location.href='home.php?page=projeto-listar';</script>";
			exit;
		}

		$sql = "DELETE FROM projeto WHERE idProjeto = {$idProjeto}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=projeto-listar');
		} else {
			print "<script>alert('Não foi possivel deletar o projeto');</script>";
			print "<script>location.href='?page=projeto-listar';</script>";
		}
		exit;
	}

	if (isset($_POST['projeto_edit'])) {
		$idProjeto = $_POST['idProjeto'];
		$nome = $_POST['nome'];
		$local = $_POST['local'];
		$numDepartamento = $_POST['num-departamento'];

		$sql = "UPDATE projeto SET Nome = '{$nome}', Local = '{$local}', fkNumDepartamento = {$numDepartamento} WHERE idProjeto = {$idProjeto}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=projeto-listar');
		} else {
			print "<script>alert('Não foi possivel atualizar o projeto');</script>";
			print "<script>location.href='?page=projeto-listar';</script>";
		}
		exit;
	}

###################################### PROJETO  ######################################


###################################### DEPARTAMENTO  ######################################

	if (isset($_POST['departamento_create'])) {
		$nome = $_POST['local'];
		$cpfGerente = $_POST['cpfGerente'];
		$datainicio = $_POST['datainicio'];
		$localdepartamento = $_POST['localdepartamento'];

		$sql = "INSERT INTO departamento (fkCpf, NomeDepartamento, DataInicioGerente, fkidLocalDepartamento) 
				VALUES ('{$cpfGerente}', '{$nome}', '{$datainicio}', {$localdepartamento})";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=departamento-listartodos');
		} else {
			print "<script>alert('Não foi possivel criar o departamento');</script>";
			print "<script>location.href='?page=departamento-listartodos';</script>";
		}
		exit;
	}


	if (isset($_POST['departamento_editar'])) {
		$id = $_POST['id'];
		$nome = $_POST['local'];
		$cpfGerente = $_POST['cpfGerente'];
		$datainicio = $_POST['datainicio'];
		$localdepartamento = $_POST['localdepartamento'];

		$sql = "UPDATE departamento SET fkCpf = '{$cpfGerente}' , NomeDepartamento = '{$nome}', 
							DataInicioGerente = '{$datainicio}', fkidLocalDepartamento = '{$localdepartamento}' 
				WHERE NumDepartamento = {$id}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=departamento-listartodos');
		} else {
			print "<script>alert('Não foi possivel editar o departamento');</script>";
			print "<script>location.href='?page=departamento-listartodos';</script>";
		}
		exit;
	}


	if (isset($_POST['departamento_deletar'])) {
		$id = $_POST['departamento_deletar'];

		$sql = "SELECT fkNumDepartamento FROM projeto WHERE fkNumDepartamento = {$id}";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) {
			echo "<script>alert('O local está vinculado a um projeto e não é possivel deletar.');</script>";
			echo "<script>location.href='home.php?page=departamento-listartodos';</script>";
			exit;
		}

		$sql = "DELETE FROM departamento WHERE NumDepartamento = {$id}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=departamento-listartodos');
		} else {
			print "<script>alert('Não foi possivel editar o departamento');</script>";
			print "<script>location.href='?page=departamento-listartodos';</script>";
		}
		exit;
	}
###################################### DEPARTAMENTO  ######################################

###################################### TRABALHA EM  ######################################

	if (isset($_POST['delete_trabalhaem'])) {
		$id = $_POST['delete_trabalhaem'];

		$sql = "DELETE FROM trabalha_em WHERE idTrabalhaEm = {$id}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possivel deletar o trabalho');</script>";
			print "<script>location.href='?page=funcionario-listar';</script>";
		}
		exit;
	}

	if (isset($_POST['trabalhaem_create'])) {
		$cpf = $_POST['cpf'];
		$hora = $_POST['hora'];
		$idprojeto = $_POST['idprojeto'];

		$sql = "INSERT INTO trabalha_em (fkCpf, fkIdProjeto, Horas) VALUES ('{$cpf}',{$idprojeto},{$hora})";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possivel criar o trabalho');</script>";
			print "<script>location.href='?page=funcionario-listar';</script>";
		}
		exit;
	}

	if (isset($_POST['trabalhaem_editar'])) {
		$cpf = $_POST['cpf'];
		$hora = $_POST['hora'];
		$idprojeto = $_POST['idprojeto'];
		$idTrabalhaEm = $_POST['idtrabalhaem'];
		$sql = "UPDATE trabalha_em SET fkCpf = '{$cpf}', fkIdProjeto = '{$idprojeto}', Horas = {$hora} WHERE idTrabalhaEm = {$idTrabalhaEm}";
		echo $sql;
		$res = $conn->query($sql);
		if ($res==true) {
			header('Location: home.php?page=funcionario-listar');
		} else {
			print "<script>alert('Não foi possivel criar o trabalho');</script>";
			print "<script>location.href='?page=funcionario-listar';</script>";
		}
		exit;
	}
###################################### TRABALHA EM  ######################################

?>