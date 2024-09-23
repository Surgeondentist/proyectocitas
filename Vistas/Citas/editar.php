<h1 class="text-light">Editar Cita #<?= $citas['Id'] ?></h1>
<hr>
<form method="POST" action="<?= ruta("citas", "editar", ['id' => $citas['Id']]) ?>">

<div class="mb-3">
    <label for="fecha" class="form-label text-light">Fecha para la cita</label>
    <input type="date" class="form-control" id="fecha" name="fecha">
</div>

<div class="mb-3">
    <label for="paciente" class="form-label text-light" >Id del paciente</label>
    <input class="form-control" id="paciente" name="paciente"/>
</div>

<div class="mb-3">
    <label for="servicio" class="form-label text-light" >Servicio requerido</label>
    <input class="form-control" id="servicio" name="servicio"/>
</div>
    
<div class="mb-3">
    <a class="btn btn-secondary" href="./?controlador=citas&accion=listado">Cancelar</a>
    <button  
    class="btn btn-success"  
    type="submit"  
    name="btn_actualizar">Actualizar</button>
</div>

</form>