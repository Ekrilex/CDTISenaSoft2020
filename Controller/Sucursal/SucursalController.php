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

		public function guardar(){

			$sucursal = new tbl_sucursal();

			$sucursal->suc_id = $this->model->autoincrement("tbl_sucursal","suc_id");
			$sucursal->suc_nombre = $_REQUEST['suc_nombre'];
			$sucursal->suc_telefo = $_REQUEST['suc_telefo'];
			$sucursal->suc_direcc = $_REQUEST['suc_direcc'];
			$sucursal->suc_barrio = $_REQUEST['suc_barrio'];
			$sucursal->suc_ciudad = $_REQUEST['suc_ciudad'];
			$sucursal->suc_empid = $_REQUEST['suc_empid'];
			$sucursal->suc_estado = 1;

			$sql = "INSERT INTO tbl_sucursal (suc_id,suc_nombre,suc_telefo,suc_direcc,suc_barrio,suc_ciudad,suc_empid,suc_estado) 
			VALUES(".$sucursal->suc_id.", '".$sucursal->suc_nombre."', '".$sucursal->suc_telefo."', '".$sucursal->suc_direcc."','".$sucursal->suc_barrio."','".$sucursal->suc_ciudad."', ".$sucursal->suc_empid.",".$sucursal->suc_estado.")";

				try{

					$insercion = $this->model->insertar($sql);
					$_SESSION['registrar'] = "<span class='text-Success'>la sucursal <b>".$sucursal->suc_nombre."</b> Se ha registrado satisfactoriamente</span>";
				}catch(Excepction $e){
					$_SESSION['registrarError'] = "<span class='text-danger'>la sucursal <b>".$sucursal->suc_nombre."</b> no Se ha registrado satisfactoriamente</span>";

				}

				redirect(getUrl("Sucursal","Sucursal","crear"));

		}

		public function index(){

			$sql = "SELECT * FROM tbl_sucursal, tbl_empresa WHERE suc_empid = emp_id";

			$consultaSucursales = $this->model->consultar($sql);

			include_once '../View/Sucursal/index.php';
		}

		public function editar(){

			$suc_id = $_REQUEST['suc_id'];

			$sql = "SELECT * FROM tbl_sucursal, tbl_empresa WHERE suc_id = ".$suc_id." AND suc_empid = emp_id";

			$consultaSucursal = $this->model->consultar($sql);

			$sql = "SELECT * FROM tbl_empresa WHERE emp_estado = 1";

			$consultaEmpresas = $this->model->consultar($sql);

			include_once '../View/Sucursal/Editar.php';

		}

		public function actualizar(){

			$sucursal = new tbl_sucursal();

			$sucursal->suc_id = $_REQUEST['suc_id'];
			$sucursal->suc_nombre = $_REQUEST['suc_nombre'];
			$sucursal->suc_telefo = $_REQUEST['suc_telefo'];
			$sucursal->suc_direcc = $_REQUEST['suc_direcc'];
			$sucursal->suc_barrio = $_REQUEST['suc_barrio'];
			$sucursal->suc_ciudad = $_REQUEST['suc_ciudad'];
			$sucursal->suc_empid = $_REQUEST['suc_empid'];

			$sql = "UPDATE tbl_sucursal SET suc_nombre = '".$sucursal->suc_nombre."', suc_telefo = '".$sucursal->suc_telefo."', suc_direcc = '".$sucursal->suc_direcc."', suc_barrio = '".$sucursal->suc_barrio."', suc_ciudad = '".$sucursal->suc_ciudad."', suc_empid = ".$sucursal->suc_empid." WHERE suc_id = ".$sucursal->suc_id."";

			try{
				$actualizacion = $this->model->editar($sql);
				$_SESSION['editar'] = "<span class='text-danger'>la Sucursal <b>".$sucursal->suc_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

			}catch(Exception $e){
				$_SESSION['editarError'] = "<span class='text-danger'>la Sucursal <b>".$sucursal->suc_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

			}

			redirect(getUrl("Sucursal","Sucursal","index"));

		}

		public function cambiarEstado(){

			$suc_id = $_REQUEST['id'];
			$estado = $_REQUEST['estado'];

			//echo "<script>alert('".$cli_id." : ".$estado."')</script>";

			if($estado == 1){

				$sql = "UPDATE tbl_sucursal SET suc_estado = 2 WHERE suc_id = ".$suc_id."";

			}else{

				$sql = "UPDATE tbl_sucursal SET suc_estado = 1 WHERE suc_id = ".$suc_id."";
			}

			$inhabilitacion = $this->model->eliminar($sql);

			$sql = "SELECT * FROM tbl_sucursal, tbl_empresa WHERE suc_empid = emp_id";

			$consultaSucursales = $this->model->consultar($sql);

			include_once '../View/Sucursal/cambiaEstado.php';

		}

	}

?>