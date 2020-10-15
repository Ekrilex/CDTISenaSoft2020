<?php 

	include_once '../Model/AccesoModel.php';

	class AccesoController{

		private $model;

		public function __construct(){

			$this->model = new AccesoModel();

		}

		public function login(){

			$user = $_REQUEST['user'];
			$pass = $_REQUEST['pass'];

			$sql = "SELECT * FROM tbl_usuario, tbl_rol WHERE usu_passwod = '".$pass."' AND usu_login = '".$user."' AND usu_rolid = rol_id";

			$consultaUsuario = $this->model->consultar($sql);

			if(count($consultaUsuario) > 0){

				foreach($consultaUsuario as $usuario){

					//echo "hola";

					if($usuario->usu_estado == 1){

						$_SESSION['id'] = $usuario->usu_id;
						$_SESSION['nombre'] = $usuario->usu_nombre;
						$_SESSION['apellido'] = $usuario->usu_apelld;
						$_SESSION['nickname'] = $usuario->usu_login;
						$_SESSION['telefono'] = $usuario->usu_telefn;
						$_SESSION['rol'] = $usuario->usu_rolid;
						$_SESSION['nombreRol'] = $usuario->rol_nombre;
						$_SESSION['sucursal'] = $usuario->usu_sucursal;
						$_SESSION['auth'] = "ok";

						$sql = "SELECT * FROM tbl_bodega WHERE bod_sucid = ".$usuario->usu_sucursal."";

						$consultarBodega = $this->model->consultar($sql);

						foreach($consultarBodega as $Bodega){

							$_SESSION['bodega'] = $Bodega->bod_id;
						}

						redirect("index.php");
					}else{

						$mensaje = "El usuario especificado se encuentra inhabilitado";

						redirect("../index.php?error=".$mensaje."");

					}
				}

			}else{

				$mensaje = "El usuario especificado no se encontro";

				redirect("../index.php?error=".$mensaje."");
			}

		}

		public function logout(){

			session_destroy();

			redirect("../index.php");

		}

	}

?>