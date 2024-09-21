<h1>Editar usuario #<?= $usuario['Id'] ?></h1>
<hr>
<form method="POST" action="<?= ruta("usuarios", "editar", ['id' => $usuario['Id']]) ?>">

<div class="mb-3">
    <label for="Nombre" class="form-label">Nombre del Usuario</label>
    <input class="form-control" id="Nombre" name="Nombre" value="<?= $usuario['Nombre']?>">
</div>

<div class="mb-3">
    <label for="email" class="form-label" >E-mail del usuario</label>
    <input class="form-control" id="email" name="email"  value="<?= $usuario['email'] ?>"/>
</div>

<div class="mb-3">
    <label for="contrasena" class="form-label" >Contrasena para el usuario</label>
    <input class="form-control" id="contrasena" name="contrasena" value= "<?= $usuario['contrasena'] ?>"/>
</div>
    
<div class="mb-3">
    <a class="btn btn-secondary" href="./?controlador=usuarios&accion=listado">Cancelar</a>
    <button  
    class="btn btn-success"  
    type="submit"  
    name="btn_actualizar">Actualizar</button>
</div>

</form>