<div class="page-inner">
<div class="page-header">
		<h4 class="page-title">Usuarios</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Panel de control</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Usuarios</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Consultar Usuarios</a>
			</li>
		</ul>
	</div>

<table id="example" class=" data-table display table" style="width:100%">
	<thead class="thead-dark">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Rol</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($usuario as $value):?>
			<tr>
				<td><?php echo $value->usu_id; ?></td>
				<td><?php echo $value->usu_nombre; ?></td>
				<td><?php echo $value->usu_apelld; ?></td>
				<td><?php echo $value->usu_telefn; ?></td>
				<?php  
				
				if($value->usu_estado == 1){
				   $r="Habilitado";
				}else{
                    $r="Inhabilitado";
				}
                $rr=$value->usu_id;
				?>

				<td><?php echo $value->rol_nombre; ?></td>
				<td><?php echo $r; ?></td>
				<td> <a class="btn btn-info" href="<?php echo getUrl('Usuario','Usuario','getUpdate', array('usu_id' => $value->usu_id)) ?>" data-url='<?php echo getUrl("Usuario","Usuario","postDelete",false,"ajax") ?>'>Editar</a>
			    <button class="btn btn-danger">Inhabilitar</button></td>
			</tr>
		<?php endforeach; ?>
		
	</tbody>
</table>
</div>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			lengthMenu: [
			[ 10, 25, 50, 100, -1 ],
			[ '10 Filas', '25 Filas', '50 Filas','100 Filas', 'Mostrar Todos' ]
			],
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
			}
		} );
	} );
</script>



