<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!--Íconos fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
	<!--Mi Css-->
	<link rel="stylesheet" type="text/css" href="Web/assets/css/style.css">
	<link rel="stylesheet" href="Web/assets/css/login.css">

	<title>PROFAC</title>
	<link rel="icon" href="Web/assets/img/icon.ico" type="image/x-icon"/>
</head>

<body id="page">
	<ul class="cb-slideshow">
		<li><span>Image 01</span><div><h3>Facturación</h3></div></li>
		<li><span>Image 02</span><div><h3>Proveedores</h3></div></li>
		<li><span>Image 03</span><div><h3>Productos</h3></div></li>
		<li><span>Image 04</span><div><h3>Clientes</h3></div></li>
		<li><span>Image 05</span><div><h3>Soluciones</h3></div></li>
		<li><span>Image 06</span><div><h3>Creatividad</h3></div></li>
	</ul>
	<div class="menu">
		<div class="logo"></div>
		<button type="button" class="btn btn-primary"  data-backdrop="static" data-keyboard="false" data-toggle="modal"  data-target="#login"> Iniciar Sesion </button>
	</div>
	<?php 

		include_once 'Lib/Helpers.php';
	?>
	<!--Modal Inicio de Sesion -->
	<div class="container">
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginlabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>				
						<div class="minilogo"></div>
						<h1> Bienvenido <br>PROFAC </h1>
					</div>
					<div class="modal-body">
						<form action="<?php echo getUrl('Acceso','Acceso','login',false,'ajax')?>" name="formlogin" method="POST" target="_self">
							<br>
							<div class="form-group">
								<label for="user"><i class="fas fa-user"></i> Usuario</label><br>
								<input type="text" class="form-control" name="user" required><br>
							</div>
							<div class="form-group">
								<label for="pass">Contraseña</label><br>
								<input type="password" class="form-control" name="pass" required="true"><br>
							</div>
							<br>
							<div class="form-group">
								<input type="button"  class="btn btn-primary" value="Cancelar" data-dismiss="modal">
								<input type="submit"  class="btn btn-primary" value="Iniciar">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</body>
</html>


