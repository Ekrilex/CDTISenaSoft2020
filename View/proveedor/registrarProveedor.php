<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Proveedor</h4>
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
				<a href="#">Proveedor</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Registrar Proveedor</a>
			</li>
		</ul>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Registrar Proveedor</div>
			</div>
			<div class="card-body">
				<form action="<?php echo getUrl('proveedor','proveedor','guardar')?>" method="POST">

					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Numero de identificacion</label>
							<input type="number" class="form-control" name="prv_id" placeholder="Código registro" disabled>
						</div>
						<div class="form-group col-md-4">
							<label>Razón Social</label>
							<input type="text" class="form-control" name="prv_razsoc" placeholder="Razón Social">
						</div> 
						<div class="form-group col-md-4">
							<label>Nit Empresa</label>
							<input type="number" class="form-control" name="prv_nit" placeholder="Nit Empresa">
						</div>

					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Nombre Comercial</label>
							<input type="text" class="form-control" name="prv_nomcom" placeholder="Nombre Comercial">
						</div> 
						<div class="form-group col-md-4">
							<label>Correo electrónico</label>
							<input type="mail" class="form-control" name="prv_correo" placeholder="Correo electrónico">
						</div> 
						<div class="form-group col-md-4">
							<label>Telefono de contacto</label>
							<input type="mail" class="form-control" name="prv_telefo" placeholder="Telefono de contacto">
						</div> 

					</div>
					<div class="card-action">
						<a class="btn btn-secondary" href='<?php echo getUrl('proveedor','proveedor','index')?>'>Salir</a>
						<button type="submit" class="btn btn-success">Registrar Proveedor</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>