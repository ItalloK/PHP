<?php
  require('conexao.php');

  $sql = "SELECT * FROM local_departamento WHERE idLocalDepartamento = '".$_REQUEST["id"]."'";
  $res = $conn->query($sql);
  $row = $res->fetch_object();

?>

<h2>Editar Local de Departamentos</h2>

<form action="acoes.php" method="POST"> 
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o local do Departamento" value="<?php echo $row->Nome; ?>">
        <label for="nome" class="form-label">Digite o local do Departamento</label>
    </div>


    <input type="submit" name="editar_local_departamentos" class="btn btn-primary" value="Salvar">
    <input type="hidden" name="idLocal" value="<?php echo $row->idLocalDepartamento; ?>">
    <div class="col-12" id="link-container">
</form>

<div class="col-md-6 mt-3">
    <div class="row align-items-center">
        <div class="col-12" id="link-container">
            <a href="?page=local_departamentos_listar">Voltar para o Listar os Locais de Departamentos</a>
        </div>
    </div>
</div>
