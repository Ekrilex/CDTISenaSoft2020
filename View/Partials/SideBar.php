
<div class="classic-grid">
	<div class="sidebar sidebar-style-2">			
		<div class="sidebar-wrapper scrollbar scrollbar-inner">
			<div class="sidebar-content">
				<div class="user">
					<div class="avatar-sm float-left mr-2">
						<img src="assets/img/imgUsuario.png" alt="..." class="avatar-img rounded-circle">
					</div>
					<div class="info">
						<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<span>
								Dummy
								<span class="user-level">Administrador</span>
								
							</span>
						</a>
						<div class="clearfix"></div>

						<!-- <div class="collapse in" id="collapseExample">
							<ul class="nav">
								<li>
									<a href="#profile">
										<span class="link-collapse">My Profile</span>
									</a>
								</li>
								<li>
									<a href="#edit">
										<span class="link-collapse">Edit Profile</span>
									</a>
								</li>
								<li>
									<a href="#settings">
										<span class="link-collapse">Settings</span>
									</a>
								</li>
							</ul>
						</div> -->
					</div>
				</div>
				<ul class="nav nav-primary">
					<li class="nav-item active">
						<a data-toggle="collapse" href="index.php" class="collapsed" aria-expanded="false">
							<i class="fas fa-home"></i>
							<p>Main</p>
							
						</a>
						<!-- <div class="collapse" id="dashboard">
							<ul class="nav nav-collapse">
								<li>
									<a href="demo1/index.html">
										<span class="sub-item">Dashboard 1</span>
									</a>
								</li>
								<li>
									<a href="demo2/index.html">
										<span class="sub-item">Dashboard 2</span>
									</a>
								</li>
							</ul>
						</div> -->
					</li>
					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
						<h4 class="text-section">Secciones Del Sistema</h4>
					</li>
					<li class="nav-item">
						<a data-toggle="collapse" href="#base">
							<i class="fas fa-file-alt"></i>
							<p>Facturación</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="base">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo getUrl('factura','factura','crear')?>">
										<span class="sub-item">Registrar Factura</span>
									</a>
								</li>
								<li>
									<a href="components/buttons.html">
										<span class="sub-item">Consultar Facturas</span>
									</a>
								</li>
								<li>
									<a href="components/buttons.html">
										<span class="sub-item">Ver Borradores</span>
									</a>
								</li>
								
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a data-toggle="collapse" href="#sidebarLayouts">
							<i class="fas fa-database"></i>
							<p>Inventario</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="sidebarLayouts">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo getUrl('Bodega','Bodega','index');?>">
										<span class="sub-item">Abastecer inventario Bodega</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a data-toggle="collapse" href="#forms">
							<i class="fas fa-pen-square"></i>
							<p>Productos</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="forms">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo getUrl('Producto','Producto','crear')?>">
										<span class="sub-item">Registrar Producto</span>
									</a>
								</li>
								<li>
									<a href="<?php echo getUrl('Producto','Producto','index')?>">
										<span class="sub-item">Consultar Producto</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<!-- <li class="nav-item">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-table"></i>
							<p>Tables</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="tables/tables.html">
										<span class="sub-item">Basic Table</span>
									</a>
								</li>
								<li>
									<a href="tables/datatables.html">
										<span class="sub-item">Datatables</span>
									</a>
								</li>
							</ul>
						</div>
					</li> -->
					<!-- <li class="nav-item">
						<a data-toggle="collapse" href="#maps">
							<i class="fas fa-map-marker-alt"></i>
							<p>Maps</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="maps">
							<ul class="nav nav-collapse">
								<li>
									<a href="maps/jqvmap.html">
										<span class="sub-item">JQVMap</span>
									</a>
								</li>
							</ul>
						</div>
					</li> -->
					<!-- <li class="nav-item">
						<a data-toggle="collapse" href="#charts">
							<i class="far fa-chart-bar"></i>
							<p>Charts</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="charts">
							<ul class="nav nav-collapse">
								<li>
									<a href="charts/charts.html">
										<span class="sub-item">Chart Js</span>
									</a>
								</li>
								<li>
									<a href="charts/sparkline.html">
										<span class="sub-item">Sparkline</span>
									</a>
								</li>
							</ul>
						</div>
					</li> -->
					<!-- <li class="nav-item">
						<a href="widgets.html">
							<i class="fas fa-desktop"></i>
							<p>Widgets</p>
							<span class="badge badge-success">4</span>
						</a>
					</li> -->
					<li class="nav-item">
						<a data-toggle="collapse" href="#submenu">
							<i class="fas fa-bars"></i>
							<p>Panel De Control</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="submenu">
							<ul class="nav nav-collapse">
								<li>
									<a data-toggle="collapse" href="#subnav1">
										<span class="sub-item">Clientes</span>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="subnav1">
										<ul class="nav nav-collapse subnav">
											<li>
												<a href="<?php echo getUrl('Cliente','Cliente','crear')?>">
													<span class="sub-item">Registrar Cliente</span>
												</a>
											</li>
											<li>
												<a href="<?php echo getUrl('Cliente','Cliente','index')?>">
													<span class="sub-item">Consultar Cliente</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li>
									<a data-toggle="collapse" href="#subnav2">
										<span class="sub-item">Tiendas</span>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="subnav2">
										<ul class="nav nav-collapse subnav">
											<li>
												<a href="<?php echo getUrl('tienda','tienda','crear'); ?>">
													<span class="sub-item">Registrar Tienda</span>
												</a>
											</li>
											<li>
												<a href="<?php echo getUrl('tienda','tienda','index'); ?>">
													<span class="sub-item">Consultar Tienda</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li>
									<a data-toggle="collapse" href="#subnav3">
										<span class="sub-item">Sucursales</span>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="subnav3">
										<ul class="nav nav-collapse subnav">
											<li>
												<a href="<?php echo getUrl('Sucursal','Sucursal','crear')?>">
													<span class="sub-item">Registrar Sucursal</span>
												</a>
											</li>
											<li>
												<a href="<?php echo getUrl('Sucursal','Sucursal','index')?>">
													<span class="sub-item">Consultar Sucursal</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li>
									<a data-toggle="collapse" href="#subnav4">
										<span class="sub-item">Usuarios</span>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="subnav4">
										<ul class="nav nav-collapse subnav">
											<li>
												<a href="<?php  echo getUrl("Usuario","Usuario","getCreate");?>">
													<span class="sub-item">Registrar Usuario</span>
												</a>
											</li>
											<li>
												<a href="<?php echo getUrl('Usuario','Usuario','index');?>">
													<span class="sub-item">Consultar Usuario</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li>
									<a data-toggle="collapse" href="#subnav5">
										<span class="sub-item">Proovedor</span>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="subnav5">
										<ul class="nav nav-collapse subnav">
											<li>
												<a href="<?php  echo getUrl("Usuario","Usuario","getCreate");?>">
													<span class="sub-item">Registrar Proovedor</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="sub-item">Consultar Proovedor</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<!-- <li>
									<a href="#">
										<span class="sub-item">Level 1</span>
									</a>
								</li> -->
							</ul>
						</div>
					</li>
					<!-- <li class="mx-4 mt-2">
						<a href="http://themekita.com/atlantis-bootstrap-dashboard.html" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Buy Pro</a> 
					</li> -->
				</ul>
			</div>
		</div>
	</div>
