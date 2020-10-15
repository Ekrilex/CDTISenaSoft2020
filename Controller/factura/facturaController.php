<?php 

	include_once '../Model/tbl_factura.php';
	include_once '../Model/tbl_producto.php';

	class FacturaController {

		private $model;
		private $modelP;

		public function __construct(){

			$this->model = new tbl_factura();
			$this->modelP = new tbl_producto();

		}

		public function crear(){

			$productos=new tbl_producto();

			$productos=$this->modelP->consultar('select * from tbl_producto');


			include_once '../View/factura/registrarFactura.php';

		}

		public function index(){

			$factura=new tbl_factura();
			$factura=$this->model->consultar('select * from tbl_factura where emp_estado<>0');


			include_once '../View/factura/facturaView.php';
			


		}


		public function guardar(){

			$empresa=new tbl_factura();

			$empresa->emp_razsoc=$_REQUEST['emp_razsoc'];
			$empresa->emp_nit=$_REQUEST['emp_nit'];
			$empresa->emp_nomcom=$_REQUEST['emp_nomcom'];
			$empresa->emp_corfis=$_REQUEST['emp_corfis'];
			$empresa->emp_telfis=$_REQUEST['emp_telfis'];

			

			$this->model->insertar("insert into tbl_factura (emp_razsoc, emp_nit, emp_nomcom, emp_corfis, emp_telfis) values('".$empresa->emp_razsoc."',".$empresa->emp_nit.",'".$empresa->emp_nomcom."','".$empresa->emp_corfis."','".$empresa->emp_telfis."')");

			redirect(getUrl('factura','factura','index'));
			
		}


		public function edit(){
			$factura =new tbl_factura();
			$factura=$this->model->consultar('select * from tbl_factura where emp_id='.$_REQUEST['emp_id']);
			include_once '../View/factura/editarfactura.php';
		}



		public function editar(){
			
			$empresa =new tbl_factura();

			$empresa->emp_id=$_REQUEST['emp_id'];
			$empresa->emp_razsoc=$_REQUEST['emp_razsoc'];
			$empresa->emp_nit=$_REQUEST['emp_nit'];
			$empresa->emp_nomcom=$_REQUEST['emp_nomcom'];
			$empresa->emp_corfis=$_REQUEST['emp_corfis'];
			$empresa->emp_telfis=$_REQUEST['emp_telfis'];

 			$sql="UPDATE tbl_factura set emp_razsoc='".$empresa->emp_razsoc."', emp_nit=$empresa->emp_nit, emp_nomcom='".$empresa->emp_nomcom."',emp_corfis='".$empresa->emp_corfis."', emp_telfis='".$empresa->emp_telfis."' WHERE emp_id=$empresa->emp_id";
			$this->model->editar($sql);	
			redirect(getUrl('factura','factura','index'));

		}

		public function cambiarEstado(){

			$emp_id = $_REQUEST['emp_id'];
			$estado = $_REQUEST['estado'];

			//echo "<script>alert('".$cli_id." : ".$estado."')</script>";

			if($estado == 1){

				$sql = "UPDATE tbl_factura SET emp_estado = 2 WHERE emp_id = ".$emp_id."";

			}else{

				$sql = "UPDATE tbl_factura SET emp_estado = 1 WHERE emp_id = ".$emp_id."";
			}

			$inhabilitacion = $this->model->eliminar($sql);

			$sql = "SELECT * FROM tbl_factura";

			$consultaEmpresa = $this->model->consultar($sql);

			include_once '../View/factura/cambiaEstado.php';

		}




	}


?>