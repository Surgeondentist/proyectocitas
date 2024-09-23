<h1>Listado de Citas</h1>
<p>Aqui se mostrara la lectura de los libros totales</p>
<h1>Listado de Usuarios</h1>
<div>
<a  href="./?controlador=citas&accion=crear"    type="button" class="btn btn-primary">Crear una cita</a>
</div>
<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Fecha</th>
      <th scope="col">Paciente</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $citas) { ?>
        
    
    <tr>
      <th scope="row"><?= $citas['Id']?></th>
      <td><?= $citas['fecha']?></td>
      <td><?= $citas['paciente']?></td>
      <td>
            <?=  crearLink("Editar", [
            'controlador' => 'citas',
            'accion' => 'editar',
            'parametros' => [
              'id' => $citas['Id']
            ],
            'optionsHtml' => [
              'class' => "btn btn-outline-info btn-sm"
            ]
])?>

<?=  crearLink("Eliminar", [
            'controlador' => 'citas',
            'accion' => 'Eliminar',
            'parametros' => [
              'id' => $citas['Id']
            ],
            'optionsHtml' => [
              'class' => "btn btn-outline-danger btn-sm"
            ]
])?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>