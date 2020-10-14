<?php 

	include_once '../Model/tienda.php';

	class TiendaController {

		private $model;

		public function __construct(){

			$this->model = new tbl_empresa();

		}

		public function crear(){


			include_once '../View/tienda/registrarTienda.php';

		}

		public function index(){

			$tienda=new tbl_empresa();
			$tienda=$this->model->consultar('select * from tbl_empresa where emp_estado<>0');


			include_once '../View/tienda/tiendaView.php';
			


		}




	}


?>