<?php 

include_once '../Model/tbl_proveedor.php';

class ProveedorController {

	private $model;

	public function __construct(){

		$this->model = new tbl_proveedor();

	}

	public function crear(){


		include_once '../View/proveedor/registrarProveedor.php';

	}

	public function index(){

		$proveedor=new tbl_proveedor();
		$proveedor=$this->model->consultar('select * from tbl_proveedor where prv_estado<>0');


		include_once '../View/proveedor/consultaProveedor.php';



	}


	public function guardar(){

		$proveedor=new tbl_proveedor();

		$proveedor->prv_razsoc=$_REQUEST['prv_razsoc'];
		$proveedor->prv_nit=$_REQUEST['prv_nit'];
		$proveedor->prv_nomcom=$_REQUEST['prv_nomcom'];
		$proveedor->prv_correo=$_REQUEST['prv_correo'];
		$proveedor->prv_telefo=$_REQUEST['prv_telefo'];



		$this->model->insertar("insert into tbl_proveedor (prv_razsoc, prv_nit, prv_nomcom, prv_correo, prv_telefo) values('".$proveedor->prv_razsoc."',".$proveedor->prv_nit.",'".$proveedor->prv_nomcom."','".$proveedor->prv_correo."','".$proveedor->prv_telefo."')");

		redirect(getUrl('proveedor','proveedor','index'));

	}


	public function edit(){
		$proveedor = new tbl_proveedor();
		$proveedor=$this->model->consultar('select * from tbl_proveedor where prv_id='.$_REQUEST['prv_id']);
		include_once '../View/proveedor/editarProveedor.php';
	}



	public function editar(){

		$proveedor =new tbl_proveedor();

		$proveedor->prv_id=$_REQUEST['prv_id'];
		$proveedor->prv_razsoc=$_REQUEST['prv_razsoc'];
		$proveedor->prv_nit=$_REQUEST['prv_nit'];
		$proveedor->prv_nomcom=$_REQUEST['prv_nomcom'];
		$proveedor->prv_correo=$_REQUEST['prv_correo'];
		$proveedor->prv_telefo=$_REQUEST['prv_telefo'];

		$sql="UPDATE tbl_proveedor set prv_razsoc='".$proveedor->prv_razsoc."', prv_nit=$proveedor->prv_nit, prv_nomcom='".$proveedor->prv_nomcom."',prv_correo='".$proveedor->prv_correo."', prv_telefo='".$proveedor->prv_telefo."' WHERE prv_id=$proveedor->prv_id";
		$this->model->editar($sql);	
		redirect(getUrl('proveedor','proveedor','index'));

	}

	public function cambiarEstado(){

		$prv_id = $_REQUEST['prv_id'];
		$estado = $_REQUEST['estado'];

			//echo "<script>alert('".$cli_id." : ".$estado."')</script>";

		if($estado == 1){

			$sql = "UPDATE tbl_proveedor SET prv_estado = 2 WHERE prv_id = ".$prv_id."";

		}else{

			$sql = "UPDATE tbl_proveedor SET prv_estado = 1 WHERE prv_id = ".$prv_id."";
		}

		$inhabilitacion = $this->model->eliminar($sql);

		$sql = "SELECT * FROM tbl_proveedor";

		$consultaProveedor = $this->model->consultar($sql);

		include_once '../View/proveedor/cambiaEstado.php';

	}




}


?>