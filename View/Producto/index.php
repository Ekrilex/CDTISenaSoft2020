

<!--REALIZAR PAGINACON DE LOS REGISTROS-->
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
				<a href="#">Producto</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">ConsultarProducto</a>
			</li>
		</ul>
	</div>
	<div class="card">
		<div class="card-header">
			<div class="card-title">Consultar Productos</div>
			<div class="form-row">
				
				<div class="input-group">
					<label>Search:<input type="search" class="form-control form-control-sm ml-auto" id="campoFiltro" data-url="<?php echo getUrl('Producto','Producto','filtrar',false,'ajax')?>" placeholder=""></label>
				</div>
			</div>
		</div>
		<div class="card-body" id="bodyConsulta">
			<div class="form-row">

			<?php foreach($consultaProductos as $producto) {?>
					<div class="col-md-3">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src="<?php echo $producto->pro_foto?>" alt="Imagen Producto" width="300px" height="150px">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $producto->pro_nombre?></h5>
						    <p class="card-text"><b>Marca: </b>&nbsp;<?php echo $producto->pro_marca?></p>
						  </div>
						  <ul class="list-group list-group-flush">
						  	<li class="list-group-item"><b>codigo: </b>&nbsp;<?php echo $producto->pro_codigo?></li>
						    <li class="list-group-item"><b>precio: </b>&nbsp;<?php echo $producto->pro_precio?></li>
						    <li class="list-group-item"><b>Existencias: </b>&nbsp;<?php echo $producto->pro_stock?></li>

						    <?php
						     	if($producto->pro_estado == 3){
						     		$estado = "<span class='text-success'> Disponible</span>";

						 		}else if($producto->pro_estado == 4){
						 			$estado = "<span class='text-warning'> Pocas Unidades</span>";

						 		}else if($producto->pro_estado == 5){
						 			$estado = "<span class='text-danger'> Agotado</span>";

						 		}else if($producto->pro_estado == 2){
						 			$estado = "<span class='text-danger'> Inhabilitado</span>";
						 		}

						     	?>

						    	<li class="list-group-item"><b>Estado: &nbsp;</b><?php echo $estado?></li>
						    	<li class="list-group-item"><b>Usuario Que creo el Registro: &nbsp;</b><?php echo $producto->usu_nombre." ".$producto->usu_apelld?></li>
						  </ul>
						  <div class="card-body">
						    <a href="<?php echo getUrl('Producto','Producto','editar',array('pro_id' => $producto->pro_id))?>" class="card-link btn btn-info">Editar</a>
						    <?php if($producto->pro_estado != 2){?>

						    	<button type="button" data-url="<?php echo getUrl('Producto','Producto','cambiarEstado',false,'ajax')?>" data-id="<?php echo $producto->pro_id?>" data-estado="1" data-stock="<?php echo $producto->pro_stock?>" class="card-link btn btn-danger cambiaEstadoProd">Inhabilitar</a>

						    <?php }else{ ?>

						    	<button type="button" data-url="<?php echo getUrl('Producto','Producto','cambiarEstado',false,'ajax')?>" data-id="<?php echo $producto->pro_id?>" data-estado="2" data-stock="<?php echo $producto->pro_stock?>" class="btn btn-success cambiaEstadoProd">Habilitar</a>

						    <?php }?>
						  </div>
						</div>
					</div>
				


			<?php } ?>
			</div>
		</div>
	</div>
</div>
<!--
	El usuario podra inhabilitar los productos
	se haria una validacion al habilitar denuevo para que ponga el estado segun el stock que tenga el producto en ese momento
-->