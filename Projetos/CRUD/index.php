<!doctype html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>Cadastro</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Cadastro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="novoUsuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Novo Usuário
            </a>
            <ul class="dropdown-menu" aria-labelledby="novoUsuarioDropdown">
              <li><a class="dropdown-item" href="?page=novo">Cadastrar Novo</a></li>
              <li><a class="dropdown-item" href="?page=importar">Importar Usuários</a></li>
              <!-- Adicione outras opções aqui -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="listarUsuariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Listar Usuários
            </a>
            <ul class="dropdown-menu" aria-labelledby="listarUsuariosDropdown">
              <li><a class="dropdown-item" href="?page=listar">Listar Todos</a></li>
              <li><a class="dropdown-item" href="?page=listarAtivos">Listar Ativos</a></li>
              <li><a class="dropdown-item" href="?page=listarInativos">Listar Inativos</a></li>
              <!-- Adicione outras opções aqui -->
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
          case "novo":
            include("novo-usuario.php");
            break;
          case "listar":
            include("listar-usuario.php");
            break;
          case "salvar":
            include("salvar-usuario.php");
            break;
          case "editar":
            include("editar-usuario.php");
            break;
          default:
            print "<h1>bem vindos</h1>";
        }
        ?>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>