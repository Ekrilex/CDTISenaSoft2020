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


			$insercionCliente = $this->model->insertar($sql);

			 if($insercionCliente){
			  	$_SESSION['registrar'] = "<span class='text-danger'>El Cliente <b>".$cliente->cli_nombre."</b> Se ha registrado satisfactoriamente</span>";
			  }

			redirect(getUrl("Cliente","Cliente","index"));


		}

		public function index(){

			$sql = "SELECT * FROM tbl_cliente WHERE cli_estado = 2";

			$consultaClientes = $this->model->consultar($sql);
			//var_dump($consultaClientes);
			include_once '../View/Cliente/index.php';

		}




	}


?>