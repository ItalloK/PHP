<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>
    <?php 
      switch (@$_REQUEST["page"]) {
        case "importar":
          echo "Importar Usuários";
          break;
        case "listar_departamentos":
          echo "Departamentos";
          break;
        case "listar_dependentes":
          echo "Dependentes";
          break;
        case "listar_funcionarios":
          echo "Funcionários";
          break;
        case "listar_loc_departamento":
          echo "Localização dos Departamentos";
          break;
        case "listar_projetos":
          echo "Projetos";
          break;
        case "listar_trabalhaem":
          echo "Onde Trabalha";
          break;
        case "cad_funcionario":
          echo "Cadastrar Funcionario";
          break;
        case 'cad_dependente':
          echo "Cadastrar Dependente";
          break;
        case 'cad_local_departamento':
          echo "Cadastrar Local Departamento";
          break;
        case 'cad_departamento':
          echo "Cadastrar Departamento";
          break;
        case 'cad_projeto':
          echo "Cadastrar Projeto";
          break;
        case 'cad_trabalha_em':
          echo "Cadastrar Trabalha Em";
          break;
        case 'editar_projetos':
          echo "Editar Projetos";
          break;
        case 'editar_departamento':
          echo "Editar Departamento";
          break;
        case 'editar_dependente':
          echo "Editar Dependente";
          break;
        case 'editar_funcionario':
          echo "Editar Funcionario";
          break;
        case 'editar_localizar_dep':
          echo "Editar Localizacao Departamento";
          break;
        default:
          echo "CRUD PHP";
      }
    ?>
  </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">CRUD PHP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="novoUsuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastrar
            </a>
            <ul class="dropdown-menu" aria-labelledby="novoUsuarioDropdown">
              <li><a class="dropdown-item" href="?page=cad_departamento">Novo Departamento</a></li>
              <li><a class="dropdown-item" href="?page=cad_dependente">Novo Dependente</a></li>
              <li><a class="dropdown-item" href="?page=cad_funcionario">Novo Funcioario</a></li>
              <li><a class="dropdown-item" href="?page=cad_local_departamento">Novo Localizacao Departamento</a></li>
              <li><a class="dropdown-item" href="?page=cad_projeto">Novo Projeto</a></li>
              <li><a class="dropdown-item" href="?page=cad_trabalha_em">Novo Trabalha Em</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="listarUsuariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Listar
            </a>
            <ul class="dropdown-menu" aria-labelledby="listarUsuariosDropdown">
              <li><a class="dropdown-item" href="?page=listar_departamentos">Departamentos</a></li>
              <li><a class="dropdown-item" href="?page=listar_dependentes">Dependentes</a></li>
              <li><a class="dropdown-item" href="?page=listar_funcionarios">Funcionarios</a></li>
              <li><a class="dropdown-item" href="?page=listar_loc_departamento">Localizacao Departamentos</a></li>
              <li><a class="dropdown-item" href="?page=listar_projetos">Projetos</a></li>
              <li><a class="dropdown-item" href="?page=listar_trabalhaem">Onde Trabalha</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <?php
        include("config.php");
        switch (@$_REQUEST["page"]) {
          case "salvar":
            include("salvar-usuario.php");
            break;
          case "editar":
            include("editar-usuario.php");
            break;
          case "listar_departamentos":
            include("listar/listar-departamento.php");
            break;
          case "listar_dependentes":
            include("listar/listar-dependente.php");
            break;
            case "listar_funcionarios":
              include("listar/listar-funcionarios.php");
              break;
            case "listar_loc_departamento":
              include("listar/listar_loc_departamento.php");
              break;
            case "listar_projetos":
              include("listar/listar_projetos.php");
              break;
            case "listar_trabalhaem":
              include("listar/listar_trabalhaem.php");
              break;
            case "cad_funcionario":
              include("cadastrar/cad_funcionario.php");
              break;
            case "cad_dependente":
              include("cadastrar/cad_dependente.php");
              break;
            case "cad_local_departamento":
              include("cadastrar/cad_local_departamento.php");
              break;
            case "cad_departamento":
              include("cadastrar/cad_departamento.php");
              break;
            case "cad_projeto":
              include("cadastrar/cad_projeto.php");
              break;
            case "cad_trabalha_em":
              include("cadastrar/cad_trabalha_em.php");
              break;
            case "editar_projetos":
              include("editar/editar_projetos.php");
              break;
            case "editar_departamento":
              include("editar/editar_departamento.php");
              break;
            case "editar_dependente":
              include("editar/editar_dependente.php");
              break;
            case "editar_funcionario":
              include("editar/editar_funcionario.php");
              break;
            case "editar_localizar_dep":
              include("editar/editar_localizar_dep.php");
              break;
          default:
            print "<h1>CRUD PHP</h1>";
            print "<h5>CRUD criado para ser utilizado no banco de dados DbEmpresas criado em sala de aula.</br></h5>
                    <p>Nome: Italo Gabriel, RA: 044704, Curso: Engenharia de Computação, 4º Periodo</br></p>";
        }
        ?>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>