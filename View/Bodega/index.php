<div class="page-inner">
<div class="page-header">
		<h4 class="page-title">Inventario</h4>
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
				<a href="#">Inicio</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Abasteciomiento de bodega</a>
			</li>
		</ul>
	</div>

<table id="example" class=" data-table display table" style="width:100%">
	<thead class="thead-dark">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Estado</th>
			<th>Stock</th>			
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($bodega as $value):?>
			<tr>
				<td><?php echo $value->pro_id; ?></td>
				<td><?php echo $value->pro_nombre; ?></td>
				<?php  
				
				if($value->pro_estado == 4){
				   $r="Disponible";
				}else if ($value->pro_estado == 5){
                    $r="Pocas unidades";
				}else if ($value->pro_estado == 6) {
					$r="Agotado";
				}

				?>

				<td><?php echo $r; ?></td>
				<td><?php echo $value->pro_stock; ?></td>

				<td> <a class="btn btn-info">Editar</a>
				<button type="button" class="btn btn-primary imagenn" data-toggle="modal" data-target="#imagenP" data-url="<?php echo getUrl('Bodega','Bodega','imagen',false,'ajax'); ?>" data-id="<?php echo $value->pro_id; ?>">Ver imagen</button></td>
			</tr>
		<?php endforeach; ?>
		
	</tbody>
</table>

    <form action="<?php echo getUrl("Bodega","Bodega","csv") ?>"  method="POST" enctype="multipart/form-data">
    	<div class="container card bg-primary col-md-5">
  <div class="form-group">
    <h3 class="text-white text-align-center">Seleccionar archivo csv</h3>
    <input type="file" class="form-control " name="cargar">
  <input type="submit" name="enviar">
  </div>
</div>
</form>


<!-- Modal -->
<div class="modal fade" id="imagenP"  tabindex="-1" aria-labelledby="imagenP" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Imagen del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="foto"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


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



