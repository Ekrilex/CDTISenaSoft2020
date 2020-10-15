<?php 
	
	include_once '../Model/tbl_sucursal.php';

	class SucursalController {

		private $model;

		public function __construct(){

			$this->model = new tbl_sucursal();

		}

		public function crear(){

			$sql = "SELECT * FROM tbl_empresa WHERE emp_estado = 1";

			$consultaEmpresas = $this->model->consultar($sql);

			include_once '../View/Sucursal/registrar.php';

		}

		public function index(){

			$sql = "SELECT * FROM tbl_sucursal";


		}

	}

?>