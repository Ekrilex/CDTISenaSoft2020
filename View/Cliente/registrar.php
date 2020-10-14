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
				<form id="formRegistrarCliente" action="<?php echo getUrl("Cliente","Cliente","guardar") ?>" method="POST">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Numero de identificacion</label>
							<input type="number" class="form-control" name="cli_nit" placeholder="Numero Identificacion" maxlength="10">
						</div>
						<div class="form-group col-md-4">
							<label>Nombres del cliente</label>
							<input type="text" class="form-control" name="cli_nombre" placeholder="Nombres" maxlength="20">
						</div> 
						<div class="form-group col-md-4">
							<label>Apellidos del cliente</label>
							<input type="text" class="form-control" name="cli_apelld" placeholder="Apellidos"maxlength="20">
						</div> 
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Direccion</label>
							<input type="text" class="form-control" name="cli_direcc" placeholder="Direccion" maxlength="50">
						</div>
						<div class="form-group col-md-4">
							<label>Telefono Celular Del Cliente</label>
							<input type="number" class="form-control" name="cli_telefn" placeholder="Telefono Celular" maxlength="10">
						</div> 
						<div class="form-group col-md-4">
							<label>Correo Electronico del cliente</label>
							<input type="email" class="form-control" name="cli_correo" placeholder="Correo Electronico" maxlength="20">
						</div> 
					</div>
					<div class="card-action">
						<a class="btn btn-secondary" href='<?php echo getUrl('Cliente','Cliente','index')?>'>Salir</a>
						<button type="submit" class="btn btn-success">Registrar Cliente</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>