<h1>Editar Local Departamento</h1>

<?php
    $sql = "SELECT * FROM localizacao_dep WHERE Dnumero =" . $_REQUEST["id"] ;
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST"> 
    <input type="hidden" name="acao" value="editar_localizar_dep">
    <input type="hidden" name="Dnumero" value="<?php print $row->Dnumero; ?>">
    
    <div class="mb-3">
        <label>Local Departamento</label>
        <input type="text" name="Dlocal" value="<?php print $row->Dlocal; ?>" class="form-control" maxlength="15">
    </div>        
    <div class="mb-3">
        <button type="submit" class="btn_primary">Enviar</button>
    </div>
</form>