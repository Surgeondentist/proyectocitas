
<h1>Crear nuevo usuario</h1>
<hr>
<form >

<div class="mb-3">
    <label for="Nombre" class="form-label">Nombre del Usuario</label>
    <input class="form-control" id="Nombre">
</div>

<div class="mb-3">
    <label for="email" class="form-label" >E-mail del usuario</label>
    <input class="form-control" id="email"/>
</div>

<div class="mb-3">
    <label for="contrasena" class="form-label" >Contrasena para el usuario</label>
    <input class="form-control" id="contrasena"/>
</div>
    
<div class="mb-3">
    <a class="btn btn-secondary" href="./?controlador=usuarios&accion=listado">Cancelar</a>
    <button  class="btn btn-success"  type="submit">Guardar</button>
</div>

</form>
