


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
		</div>
		<div class="card-body">

		</div>
	</div>
</div>