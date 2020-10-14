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

		public function guardar(){

			$cliente = new tbl_cliente();

			$cliente->cli_id = $this->model->autoincrement("tbl_cliente","cli_id");
			$cliente->cli_nit = $_REQUEST['cli_nit'];
			$cliente->cli_nombre = $_REQUEST['cli_nombre'];
			$cliente->cli_apelld = $_REQUEST['cli_apelld'];
			$cliente->cli_direcc = $_REQUEST['cli_direcc'];
			$cliente->cli_telefn = $_REQUEST['cli_telefn'];
			$cliente->cli_estado = 1;
			$cliente->cli_correo = $_REQUEST['cli_correo'];

			$sql = "INSERT INTO tbl_cliente (cli_id,cli_nit,cli_nombre,cli_apelld,cli_direcc,cli_telefn,cli_estado,cli_correo) VALUES(".$cliente->cli_id.", ".$cliente->cli_nit.", '".$cliente->cli_nombre."', '".$cliente->cli_apelld."', '".$cliente->cli_direcc."','".$cliente->cli_telefn."',".$cliente->cli_estado.",'".$cliente->cli_correo."')";

			//echo $sql;

			try{

				$insercionCliente = $this->model->insertar($sql);
				$_SESSION['registrar'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha registrado satisfactoriamente</span>";
			}catch(Excepction $e){
			  	$_SESSION['registrarError'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha registrado satisfactoriamente</span>";

			}

			 // if($insercionCliente){
			 //  		$_SESSION['registrar'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha registrado satisfactoriamente</span>";
			 //  }else{
			 //  		$_SESSION['registrarError'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha registrado satisfactoriamente</span>";

			 //  }

			redirect(getUrl("Cliente","Cliente","crear"));


		}

		public function index(){
 
			$sql = "SELECT * FROM tbl_cliente";

			$consultaClientes = $this->model->consultar($sql);
			//var_dump($consultaClientes);
			include_once '../View/Cliente/index.php';

		}

		public function editar(){

			$cli_id = $_REQUEST['cli_id'];

			$sql = "SELECT * FROM tbl_cliente WHERE cli_id = ".$cli_id."";

			$consultaCliente = $this->model->consultar($sql);

			include_once '../View/Cliente/editar.php';

		}

		public function actualizar(){

			$cliente = new tbl_cliente();

			$cliente->cli_id = $_REQUEST['cli_id'];
			$cliente->cli_nit = $_REQUEST['cli_nit'];
			$cliente->cli_nombre = $_REQUEST['cli_nombre'];
			$cliente->cli_apelld = $_REQUEST['cli_apelld'];
			$cliente->cli_direcc = $_REQUEST['cli_direcc'];
			$cliente->cli_telefn = $_REQUEST['cli_telefn'];
			$cliente->cli_correo = $_REQUEST['cli_correo'];

			$sql = "UPDATE tbl_cliente SET cli_nit = ".$cliente->cli_nit.", cli_nombre = '".$cliente->cli_nombre."', cli_apelld ='".$cliente->cli_apelld."', cli_direcc = '".$cliente->cli_direcc."', cli_telefn = '".$cliente->cli_telefn."', cli_correo = '".$cliente->cli_correo."' WHERE cli_id = ".$cliente->cli_id."";

			//echo $sql;

			$actualizacion = $this->model->editar($sql);

			try{

				$actualizacion = $this->model->editar($sql);
				$_SESSION['editar'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

			}catch(Excepction $e){
			  	$_SESSION['editarError'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

			}

			// if($actualizacion){
			//   	$_SESSION['editar'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

			// }else{
			//   	$_SESSION['editarError'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

			// }

			redirect(getUrl("Cliente","Cliente","index"));


		}

		public function cambiarEstado(){

			$cli_id = $_REQUEST['cli_id'];
			$estado = $_REQUEST['estado'];

			//echo "<script>alert('".$cli_id." : ".$estado."')</script>";

			if($estado == 1){

				$sql = "UPDATE tbl_cliente SET cli_estado = 2 WHERE cli_id = ".$cli_id."";

			}else{

				$sql = "UPDATE tbl_cliente SET cli_estado = 1 WHERE cli_id = ".$cli_id."";
			}

			$inhabilitacion = $this->model->eliminar($sql);

			$sql = "SELECT * FROM tbl_cliente";

			$consultaClientes = $this->model->consultar($sql);

			include_once '../View/Cliente/cambiaEstado.php';

		}




	}


?>