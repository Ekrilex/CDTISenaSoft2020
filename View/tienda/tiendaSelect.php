<div class="page-inner">
<div class="page-header">
		<h4 class="page-title">Tiendas</h4>
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
				<a href="#">Tiendas</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Consultar Tiendas</a>
			</li>
		</ul>
	</div>


<table id="example" class="display table" style="width:100%">
	<thead class="bg-primary text-white">
		<tr>
			<th>ID</th>
			<th>Razon Social Empresa</th>
			<th>Nit Empresa</th>
			<th>Nombre Comercial</th>
			<th>Correo electrónico</th>
			<th>Telefono</th>
			
			<th>Estado</th>
			<th>Accion</th>

		</tr>
	</thead>
	<tbody class="tbody" id="tbodyConsultarEmpresa">
		<?php
		foreach ($tienda as $value):?>
			<tr>
				<td><?php echo $value->emp_id; ?></td>
				<td><?php echo $value->emp_razsoc; ?></td>
				<td><?php echo $value->emp_nit; ?></td>
				<td><?php echo $value->emp_nomcom; ?></td>
				<td><?php echo $value->emp_corfis; ?></td>
				<td><?php echo $value->emp_telfis; ?></td>
		
				<?php if($value->emp_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

							?>

							<td><?php echo $estado?></td>
							<td>
								<a href="<?php echo getUrl('tienda','tienda','edit',array('emp_id' => $value->emp_id)) ?>" class="btn btn-info" >Editar</a>

								<?php if($value->emp_estado == 1) {?>

									<button type="button" data-id="<?php echo $value->emp_id;?>" data-url="<?php echo getUrl('tienda','tienda','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado" >Inhabilitar</button>

								<?php }else{?>
									<button type="button" data-id="<?php echo $value->emp_id;?>" data-url="<?php echo getUrl('tienda','tienda','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado" >Habilitar</button>
								<?php }?>
							</td>
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	<tfoot class="bg-primary text-white">
		<tr>
			<th>ID</th>
			<th>Razon Social Empresa</th>
			<th>Nit Empresa</th>
			<th>Nombre Comercial</th>
			<th>Correo electrónico</th>
			<th>Telefono</th>
			
			<th>Estado</th>
			<th>Accion</th>
		</tr>
	</tfoot>
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
			buttons: [
			{
				extend: 'pageLength',
				text: 'Filtrar # Filas'
			},
			{
				extend: 'copy',
				text: 'Copiar al Portapapeles'
			},
			{
				extend: 'csv',
				text: 'Exportar CSV'
			},
			{
				extend: 'excel',
				text: 'Exportar Excel'
			},
			{
				extend: 'pdf',
				text: 'Exportar Pdf'
			},
			{
				extend: 'print',
				text: 'Imprimir Tabla'
			}
			],
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
			}
		} );
	} );
</script>