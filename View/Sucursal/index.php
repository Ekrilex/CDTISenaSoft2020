<div class="page-inner">
			<?php 

			if(isset($_SESSION['editar'])){

			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $_SESSION['editar'];?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php 

			}
			unset($_SESSION['editar']);
			?>
			<?php 

			if(isset($_SESSION['editarError'])){

			?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?php echo $_SESSION['editarError'];?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php 

			}
			unset($_SESSION['editarError']);
			?>
	<div class="page-header">
		<h4 class="page-title"></h4>
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
				<a href="#">Sucursal</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Consultar Sucursal</a>
			</li>
		</ul>
	</div>

	<div class="card">
		<div class="card-header">
			<div class="card-title">Consultar Cliente</div>
		</div>
		<div class="card-body">
			<table id="consultarSucursal" class="table">
				<thead class="thead thead-dark">
					<tr>
						<th>Nombre</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Ciudad</th>
						<th>Empresa</th>
						<th>Estado</th>
						<th>Accion</th>					
											
					</tr>
					
				</thead>
				<tbody class="tbody" id="tbodyConsultar">
					<?php foreach($consultaSucursales as $Sucursal){ ?>

						<tr>
							<td><?php echo $Sucursal->suc_nombre;?></td>
							<td><?php echo $Sucursal->suc_telefo;?></td>
							<td><?php echo $Sucursal->suc_direcc;?></td>
							<td><?php echo $Sucursal->suc_ciudad;?></td>
							<td><?php echo $Sucursal->emp_nomcom;?></td>
						

							<?php if($Sucursal->suc_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

							?>

							<td><?php echo $estado?></td>
							<td>
								<a href="<?php echo getUrl('Sucursal','Sucursal','editar',array('suc_id' => $Sucursal->suc_id))?>" class="btn btn-info" >Editar</a>

								<?php if($Sucursal->suc_estado == 1) {?>

									<button type="button" data-id="<?php echo $Sucursal->suc_id;?>" data-url="<?php echo getUrl('Sucursal','Sucursal','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado" >Inhabilitar</button>

								<?php }else{?>
									<button type="button" data-id="<?php echo $Sucursal->suc_id;?>" data-url="<?php echo getUrl('Sucursal','Sucursal','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado" >Habilitar</button>
								<?php }?>
							</td>
						</tr>

					<?php } ?>
				</tbody>
				<tfoot class="thead-dark">
					<tr>
                        <th>Nombre</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Ciudad</th>
						<th>Empresa</th>
						<th>Estado</th>
						<th>Accion</th>	
					</tr>
				</tfoot>
			</table>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#consultarSucursal').DataTable( {
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
