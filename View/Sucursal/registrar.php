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
					<a href="#">Sucursal</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Registrar Sucursal</a>
				</li>
			</ul>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Registrar Sucursal</div>
				</div>
				<div class="card-body">
					<form id="formSucursal" action="<?php echo getUrl("Sucursal","Sucursal","guardar") ?>" method="POST">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Nombre Sucursal</label>
								<input type="text" id="nombre" class="form-control novacio" name="suc_nombre" placeholder="Nombre Sucursal" maxlength="20">
							</div>
							<div class="form-group col-md-4">
								<label>Telefono De la sucursal</label>
								<input type="number" id="celular" class="form-control novacio" name="suc_telefo" min="100000" placeholder="Telefono" maxlength="10">
							</div> 
							<div class="form-group col-md-4">
								<label>Direccion de la sucursal</label>
								<input type="text" id="nombre" class="form-control novacio" name="suc_direcc" placeholder="Direccion" maxlength="20">
							</div>
								
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Nombre Del Barrio</label> 
								<input type="text" id="barrio" class="form-control novacio" name="suc_barrio" placeholder="Nombre Barrio" maxlength="20">
							</div>
							<div class="form-group col-md-4">
								<label>Nombre de la ciudad</label> 
								<input type="text" id="ciudad" class="form-control novacio" name="suc_ciudad" placeholder="Nombre Ciudad" maxlength="20">
							</div>
							<div class="form-group form-group-default col-md-4 mt-2">
								<label>Empresa a la que pertenece</label>
								<select name="suc_empid" id="empresa_id" class="form-control">
									<?php 
										foreach($consultaEmpresas as $empresa){

											echo "<option value='".$empresa->emp_id."'>".$empresa->emp_nomcom."</option>";

										}

									?>
								</select>
							</div>
						</div>
						<div class="card-action">
							<div id="errorVacio"></div>
							<a class="btn btn-secondary" href='<?php echo getUrl('Sucursal','Sucursal','index')?>'>Salir</a>
							<button type="submit" class="btn btn-success">Registrar Sucursal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>