create table tbl_estado(
	est_id int(1) auto_increment primary key,
	est_descrp varchar(1) not null
	



create table tbl_empresa(
	emp_id int(5) auto_increment primary key,
	emp_razsoc varchar(50) not null,
	emp_nit int(11) not null,
	emp_nomcom varchar(50) not null,
	emp_corfis varchar(20) not null,
	emp_telfis varchar(10) not null,
	emp_estado int(1) DEFAULT 1 not null,
	foreign key (emp_estado) references tbl_estado(est_id)
);

create table tbl_sucursal(
	suc_id int(5) auto_increment primary key,
	suc_nombre varchar(20) not null,
	suc_telefo varchar(10) not null,
	suc_direcc varchar(50) not null,
	suc_barrio varchar(20),
	suc_ciudad varchar(20),
	suc_empid int(5) not null,
	suc_estado int(1) DEFAULT 1 not null,
	foreign key (suc_estado) references tbl_estado(est_id)
);

create table tbl_bodega(
	bod_id int(5) auto_increment primary key,
	bod_descrp varchar(20) not null,
	bod_tamano int(3) not null,
	bod_sucid int(5) not null,
	bod_estado int(1) DEFAULT 1 not null,
	foreign key (bod_sucid) references tbl_sucursal(suc_id),
	foreign key (bod_estado) references tbl_estado(est_id)
);

create table tbl_producto(
	pro_id int(3) auto_increment primary key,
	pro_codigo int(10) not null,
	pro_nombre varchar(20) not null,
	pro_marca varchar(20) not null,
	pro_foto varchar(150),
	pro_precio double unsigned not null,
	pro_stock int(10) not null,
	pro_estado int(1) DEFAULT 1 not null,
	foreign key (pro_estado) references tbl_estado(est_id)
);

create table tbl_detalle_producto_bodega(
	dpb_id int(3) auto_increment primary key,
	dpb_bodid int(3) not null,
	dpb_procod int(10) not null,
	dpb_estado int(1) DEFAULT 1 not null,
	foreign key (dpb_estado) references tbl_estado(est_id)
);

create table tbl_proveedor(
	prv_id int(3) auto_increment primary key,
	prv_razsoc varchar(50) not null,
	prv_nit int(11) not null,
	prv_nomcom varchar(50) not null,
	prv_correo varchar(20) not null,
	prv_telefo varchar(10) not null,
	prv_estado int(1) DEFAULT 1 not null,
	foreign key (prv_estado) references tbl_estado(est_id)
);

create table tbl_detalle_proveedor_producto(
	dpp_id int(3) auto_increment primary key,
	dpp_procod int(10) not null,
	dpp_prvid int(3) not null,
	dpp_estado int(1) DEFAULT 1 not null,
	foreign key (dpp_procod) references tbl_producto(pro_id),
	foreign key (dpp_prvid) references tbl_proveedor(prv_id),
	foreign key (dpp_estado) references tbl_estado(est_id)
);

create table tbl_cliente(
	cli_id int(3) auto_increment not null,
	cli_nit int(10) primary key,
	cli_nombre varchar(20) not null,
	cli_apelld varchar(20) not null,
	cli_direcc varchar(50),
	cli_telefn varchar(10) not null,
	cli_estado int(1) DEFAULT 1 not null,
	cli_correo varchar(20) not null,
	foreign key (cli_estado) references tbl_estado(est_id)	
);


create table tbl_permiso(
	per_id int(3) auto_increment primary key,
	per_descrp varchar(20) not null,
	per_accion varchar(9) not null,
	per_modulo varchar(15) not null,
	per_estado int(1) DEFAULT 1 not null,
	foreign key (per_estado) references tbl_estado(est_id)
);

create table tbl_rol(
	rol_id int(3) auto_increment primary key,
	rol_nombre varchar(10) not null,
	rol_estado int(1) DEFAULT 1 not null,
	foreign key (rol_estado) references tbl_estado(est_id)
);

create table tbl_detalle_permiso_rol(
	pro_id int(3) auto_increment primary key,
	pro_permid int(3) not null,
	pro_rolid int(3) not null,
	pro_estado int(1) DEFAULT 1 not null,
	foreign key (pro_permid) references tbl_permiso(per_id),
	foreign key (pro_rolid) references tbl_rol(rol_id),
	foreign key (pro_estado) references tbl_estado(est_id)
);


create table tbl_usuario(
	usu_id int(3) auto_increment primary key,
	usu_nombre varchar(20) not null,
	usu_apelld varchar(20) not null,
	usu_login varchar(5) not null,
	usu_passwod varchar(50) not null,
	usu_telefn varchar(10) not null,
	usu_direcc varchar(50) not null,
	usu_rolid int(3) not null,
	usu_estado int(1) DEFAULT 1 not null,
	foreign key (usu_rolid) references tbl_rol(rol_id),
	foreign key (usu_estado) references tbl_estado(est_id)
);

create table tbl_estado_factura(
	etf_id int(1) auto_increment primary key,
	etf_descrp varchar(9) not null
);



create table tbl_borrador_factura(
	fab_id int(10) auto_increment primary key,
	fab_sucid int(3) not null,
	fab_clinit int(10) not null,
	fab_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fab_subtot double unsigned not null,
	fab_iva double unsigned not null,
	fab_total double unsigned not null,
	foreign key (fab_sucid) references tbl_sucursal(suc_id),
	foreign key (fab_clinit) references tbl_cliente(cli_nit)
);


create table tbl_factura(
	fac_id int(10) auto_increment primary key,
	fac_sucid int(3) not null,
	fac_clinit int(10) not null,
	fac_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fac_subtot double unsigned not null,
	fac_iva double unsigned not null,
	fac_total double unsigned not null,
	fac_fabid int(10) not null,
	fac_estado int(1) DEFAULT 1 not null,
	fac_usuid int(3) not null,
	foreign key (fac_sucid) references tbl_sucursal(suc_id),
	foreign key (fac_clinit) references tbl_cliente(cli_nit),
	foreign key (fac_fabid) references tbl_borrador_factura(fab_id),
	foreign key (fac_estado) references tbl_estado(est_id),
	foreign key (fac_usuid) references tbl_usuario(usu_id)
);

create table tbl_detalle_factura_producto(
	dfp_id int(3) auto_increment primary key,
	dfp_facid int(10) not null,
	dfp_procod int(10) not null,
	dfp_estado int(1) DEFAULT 1 not null,
	dfp_estfac int(1) not null,
	foreign key (dfp_facid) references tbl_factura(fac_id),
	foreign key (dfp_procod) references tbl_producto(pro_id),
	foreign key (dfp_estado) references tbl_estado(est_id),
	foreign key (dfp_estfac) references tbl_estado_factura(etf_id)	

);