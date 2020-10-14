<?php 
	

?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Forms</h4>
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
				<a href="#">Clientes</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Consultar Cliente</a>
			</li>
		</ul>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="card-title">Consultar Cliente</div>
		</div>
		<div class="card-body">
			<table id="consultarCliente" class="table">
				<thead class="thead thead-dark">
					<tr>
						<th>Numero identificacion</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Estado</th>					
						<th>Accion</th>					
											
					</tr>
					
				</thead>
				<tbody class="tbody" id="tbodyConsultarCliente">
					<?php foreach($consultaClientes as $Cliente){ ?>

						<tr>
							<td><?php echo $Cliente->cli_nit;?></td>
							<td><?php echo $Cliente->cli_nombre;?></td>
							<td><?php echo $Cliente->cli_apelld;?></td>
							<td><?php echo $Cliente->cli_direcc;?></td>
							<td><?php echo $Cliente->cli_telefn;?></td>

							<?php if($Cliente->cli_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

							?>

							<td><?php echo $estado?></td>
							<td>
								<a href="<?php echo getUrl('Cliente','Cliente','editar',array('cli_id' => $Cliente->cli_id))?>" class="btn btn-info" >Editar</a>

								<?php if($Cliente->cli_estado == 1) {?>

									<button type="button" data-id="<?php echo $Cliente->cli_id;?>" data-url="<?php echo getUrl('Cliente','Cliente','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado" >Inhabilitar</button>

								<?php }else{?>
									<button type="button" data-id="<?php echo $Cliente->cli_id;?>" data-url="<?php echo getUrl('Cliente','Cliente','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado" >Habilitar</button>
								<?php }?>
							</td>
						</tr>

					<?php } ?>
				</tbody>
				<tfoot class="thead-dark">
					<tr>
						<th>Numero identificacion</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Estado</th>
						<th>Accion</th>
					</tr>
				</tfoot>
			</table>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#consultarCliente').DataTable( {
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
		</div>
</div>
