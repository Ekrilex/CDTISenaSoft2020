<?php 

	include_once '../Model/AccesoModel.php';

	class AccesoController{

		private $model;

		public function __construct(){

			$this->model = new AccesoModel();

		}

		public function login(){

			$user = $_REQUEST['usu'];
			$pass = $_REQUEST['password'];

			$sql = "SELECT * FROM tbl_usuario WHERE usu_passwod = '".$pass."' AND usu_login = '".$user."'";

			$consultaUsuario = $this->model->consultar($sql);

			if(count($consultaUsuario->fetchALL()) > 0){

				echo "holaaaa";

			}

		}

	}

?>