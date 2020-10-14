
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
				<a href="#">Registrar Cliente</a>
			</li>
		</ul>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Registrar Cliente</div>
			</div>
			<div class="card-body">
				<form id="formCliente" action="<?php echo getUrl("Cliente","Cliente","guardar") ?>" method="POST">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Numero de identificacion</label>
							<input type="number" id="nit" class="form-control novacio" name="cli_nit" min="1000000000" placeholder="Numero Identificacion" maxlength="10">
						</div>
						<div class="form-group col-md-4">
							<label>Nombres del cliente</label>
							<input type="text" id="nombre" class="form-control novacio" name="cli_nombre" placeholder="Nombres" maxlength="20">
						</div> 
						<div class="form-group col-md-4">
							<label>Apellidos del cliente</label>
							<input type="text" id="apellido" class="form-control novacio" name="cli_apelld" placeholder="Apellidos"maxlength="20">
						</div> 
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Direccion</label>
							<input type="text" id="direccion" class="form-control novacio" name="cli_direcc" placeholder="Direccion" maxlength="50" minlength="5">
							<div id="errorDireccion"></div>
						</div>
						<div class="form-group col-md-4">
							<label>Telefono Celular Del Cliente</label>
							<input type="number" id="celular" class="form-control novacio" name="cli_telefn" min="1000000000" placeholder="Telefono Celular" maxlength="10">
						</div> 
						<div class="form-group col-md-4">
							<label>Correo Electronico del cliente</label>
							<input type="email" id="correo" class="form-control novacio" name="cli_correo" placeholder="Correo Electronico" maxlength="60">
						</div> 
					</div>
					<div class="card-action">
						<div id="errorVacio"></div>
						<a class="btn btn-secondary" href='<?php echo getUrl('Cliente','Cliente','index')?>'>Salir</a>
						<button type="submit" class="btn btn-success">Registrar Cliente</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>