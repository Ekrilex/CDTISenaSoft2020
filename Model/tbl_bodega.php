<?php 

	include_once '../Model/MasterModel.php';

	class tbl_bodega extends MasterModel{

		public $bod_id;
		public $bod_descrp;
		public $bod_tamano;
		public $bod_sucid;
		public $bod_estado;

		public $pro_id;
		public $pro_nombre;
		public $pro_estado;
		public $pro_stock;
		
		public $pro_foto;
		public $usu_sucursal;
		

	}



?>
