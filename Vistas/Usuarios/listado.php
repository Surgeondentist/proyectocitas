
<h1>Listado de Usuarios</h1>
<div>
<a  href="./?controlador=usuarios&accion=crear"    type="button" class="btn btn-primary">Crear Usuario</a>
</div>
<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Contrasena</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $usuario) { ?>
        
    
    <tr>
      <th scope="row"><?= $usuario['Id']?></th>
      <td><?= $usuario['Nombre']?></td>
      <td><?= $usuario['email']?></td>
      <td><?= $usuario['contrasena']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    
