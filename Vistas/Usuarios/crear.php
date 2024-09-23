
<h1 class="text-light">Crear nuevo usuario</h1>
<hr>
<form method="POST" action="./?controlador=usuarios&accion=crear">

<div class="mb-3">
    <label for="Nombre" class="form-label text-light">Nombre del Usuario</label>
    <input class="form-control" id="Nombre" name="Nombre">
</div>

<div class="mb-3">
    <label for="email" class="form-label text-light" >E-mail del usuario</label>
    <input class="form-control" id="email" name="email"/>
</div>

<div class="mb-3">
    <label for="direccion" class="form-label text-light" >Direccion</label>
    <input class="form-control" id="direccion" name="direccion"/>
</div>
    
<div class="mb-3">
    <a class="btn btn-secondary" href="./?controlador=usuarios&accion=listado">Cancelar</a>
    <button  
    class="btn btn-success"  
    type="submit"  
    name="btn_registrar">Guardar</button>
</div>

</form>
