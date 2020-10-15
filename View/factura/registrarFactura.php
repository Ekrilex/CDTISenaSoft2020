<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Facturación</h4>
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
				<a href="#">Facturación</a>
			</li>
			
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Registrar Factura</a>
			</li>
		</ul>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Registrar Factura</div>
			</div>
			<div class="card-body">
				<form action="<?php echo getUrl('factura','factura','guardar')?>" method="POST" name="formFac">

				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Id de Facturación</label>
						<input type="number" class="form-control" name="fac_id" placeholder="Código registro" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>Sucursal</label>
						<input type="text" class="form-control" name="fac_sucid" placeholder="Sucursal" readonly>
					</div> 
					<div class="form-group col-md-4">
						<label>Usuario</label>
						<input type="text" class="form-control" name="fac_usuid" placeholder="Usuario" readonly>
					</div>
					
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-3">
						<label>Cédula Cliente</label>
						<input  type="number" class="form-control" name="fac_clinit" value="" placeholder="Identificación Cliente" id="cedula" onblur="getCliente();">
					</div> 
					<div class="form-group col-md-4">
						<label>Nombre Cliente</label>
						<input type="text" class="form-control" name="fac_clinom" placeholder="Nombre Cliente" id="nombre">
					</div> 
					<div class="form-group col-md-3">
						<label>Telefono Cliente</label>
						<input type="mail" class="form-control" name="fac_clitel" placeholder="Telefono de contacto" id="telefono">
					</div>
					<div class="form-group col-md-2">

						<a id="btn" class="btn btn-success" href="<?php echo getUrl('cliente','cliente','crear')?>">Nuevo Cliente</a>
						<!--para hacerlo visible document.getElementById('pepe').style.visibility = 'visible'; -->
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">

						<label>Elegir Productos</label>
						<select  class="form-control">
							<option value="" >Seleccione Producto </option>
							<?php
							foreach ($productos as $value):?>

							<option value="<?php echo $value->pro_id; ?>" >Producto: <?php echo $value->pro_nombre; ?> >>> Marca: <?php echo $value->pro_marca; ?></option>

							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-10">

						<label>Productos Seleccionados</label>
						<textarea class="form-control" rows="5">
							

							<!-- Listado de Productos-->
						</textarea>
					</div>
				</div>

				<div class="card-action">
					<a class="btn btn-secondary" href='<?php echo getUrl('factura','factura','index')?>'>Salir</a>
					<button type="submit" class="btn btn-success">Guardar Factura</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>