<?php 

	include_once '../Model/tbl_cliente.php';

	class ClienteController {

		private $model;

		public function __construct(){

			$this->model = new tbl_cliente();

		}

		public function crear(){


			include_once '../View/Cliente/registrar.php';

		}

		public function index(){


			include_once '../View/Cliente/index.php';

		}




	}


?>