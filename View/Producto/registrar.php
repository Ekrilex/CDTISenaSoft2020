
<div class="page-inner">
			<?php 

			if(isset($_SESSION['registrar'])){

			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $_SESSION['registrar'];?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php 

			}
			unset($_SESSION['registrar']);
			?>
			<?php 

			if(isset($_SESSION['registrarError'])){

			?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?php echo $_SESSION['registrarError'];?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php 

			}
			unset($_SESSION['registrarError']);
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
					<a href="#">Registrar Producto</a>
				</li>
			</ul>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Registrar Producto</div>
				</div>
				<div class="card-body">
					<form id="formProducto" action="<?php echo getUrl("Producto","Producto","guardar") ?>" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Codigo del producto</label>
								<input type="number" id="codigo" class="form-control novacio" name="pro_codigo" placeholder="Codigo Producto" min="1000000000">
							</div>
							<div class="form-group col-md-4">
								<label>Nombre del producto</label>
								<input type="text" id="nombre" class="form-control novacio" name="pro_nombre" placeholder="Nombre Producto" maxlength="20">
							</div> 
							<div class="form-group col-md-4">
								<label>Marca del producto</label>
								<input type="text" id="marca" class="form-control novacio" name="pro_marca" placeholder="Marca Producto" maxlength="20">
							</div>
								
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Imagen del producto</label> 
								<input type="file" name="pro_foto" class="form-control novacio">
							</div>
							<div class="form-group col-md-3">
								<label>Precio del producto</label> 
								<div class="input-group">
									<input type="number" id="precio" class="form-control novacio" name="pro_precio" placeholder="Precio Producto"><span class="mt-2 ml-2 mr-2">COP</span>
								</div>
							</div>
							<div class="form-group col-md-4">
								<label>Stock (Existencias)</label>
								<input type="text" id="stock" class="form-control novacio" min="10" name="pro_stock" placeholder="Stock">
							</div>
						</div>
						<div class="card-action">
							<div id="errorVacio"></div>
							<input type="hidden" name="pro_usu" value="<?php echo $_SESSION['id'];?>">
							<a class="btn btn-secondary" href='<?php echo getUrl('Producto','Producto','index')?>'>Salir</a>
							<button type="submit" class="btn btn-success">Registrar Producto</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>