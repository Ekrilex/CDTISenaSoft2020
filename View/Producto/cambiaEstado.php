<div class="form-row">

	<?php foreach($consultaProductos as $producto) {?>
			<div class="col-md-3">
				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?php echo $producto->pro_foto?>" alt="Imagen Producto" width="300px" height="150px">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $producto->pro_nombre?></h5>
				    <p class="card-text"><b>Marca: </b> &nbsp;<?php echo " ".$producto->pro_marca?></p>
				  </div>
				  <ul class="list-group list-group-flush">
				  	<li class="list-group-item"><b>codigo: </b>&nbsp;<?php echo $producto->pro_codigo?></li>
				    <li class="list-group-item"><b>precio: </b>&nbsp;<?php echo " ".$producto->pro_precio?></li>
				    <li class="list-group-item"><b>Existencias: </b>&nbsp;<?php echo " ".$producto->pro_stock?></li>

				    <?php
				     	if($producto->pro_estado == 3){
				     		$estado = "<span class='text-success'>Disponible</span>";

				 		}else if($producto->pro_estado == 4){
				 			$estado = "<span class='text-warning'>Pocas Unidades</span>";

				 		}else if($producto->pro_estado == 5){
				 			$estado = "<span class='text-danger'>Agotado</span>";

				 		}else if($producto->pro_estado == 2){
				 			$estado = "<span class='text-danger'>Inhabilitado</span>";
				 		}

				     	?>

				    	<li class="list-group-item"><b>Estado: </b>&nbsp;<?php echo $estado?></li>
				    	<li class="list-group-item"><b>Usuario Que creo el Registro: </b>&nbsp;<?php echo $producto->usu_nombre." ".$producto->usu_apelld?></li>
				  </ul>
				  <div class="card-body">
				    <a href="<?php echo getUrl('Producto','Producto','editar',array('pro_id' => $producto->pro_id))?>" class="card-link btn btn-info">Editar</a>
				    <?php if($producto->pro_estado != 2){?>

				    	<button type="button" data-url="<?php echo getUrl('Producto','Producto','cambiarEstado',false,'ajax')?>" data-id="<?php echo $producto->pro_id?>" data-estado="1" data-stock="<?php echo $producto->pro_stock?>" class="card-link btn btn-danger cambiaEstadoProd">Inhabilitar</button>

				    <?php }else{ ?>

				    	<button type="button" data-url="<?php echo getUrl('Producto','Producto','cambiarEstado',false,'ajax')?>" data-id="<?php echo $producto->pro_id?>" data-estado="2" data-stock="<?php echo $producto->pro_stock?>" class="btn btn-success cambiaEstadoProd ml-4">Habilitar</button>

				    <?php }?>
				  </div>
				</div>
			</div>
		


	<?php } ?>
</div>