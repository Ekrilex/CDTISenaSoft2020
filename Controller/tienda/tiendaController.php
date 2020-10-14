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


		public function guardar(){

			$empresa=new tbl_empresa();

			$empresa->emp_razsoc=$_REQUEST['emp_razsoc'];
			$empresa->emp_nit=$_REQUEST['emp_nit'];
			$empresa->emp_nomcom=$_REQUEST['emp_nomcom'];
			$empresa->emp_corfis=$_REQUEST['emp_corfis'];
			$empresa->emp_telfis=$_REQUEST['emp_telfis'];

			

			$this->model->insertar("insert into tbl_empresa (emp_razsoc, emp_nit, emp_nomcom, emp_corfis, emp_telfis) values('".$empresa->emp_razsoc."',".$empresa->emp_nit.",'".$empresa->emp_nomcom."','".$empresa->emp_corfis."','".$empresa->emp_telfis."')");

			redirect(getUrl('tienda','tienda','index'));
			
		}


		public function edit(){
			$tienda =new tbl_empresa();
			$tienda=$this->model->consultar('select * from tbl_empresa where emp_id='.$_REQUEST['emp_id']);
			include_once '../View/tienda/editarTienda.php';
		}



		public function editar(){
			
			$empresa =new tbl_empresa();

			$empresa->emp_id=$_REQUEST['emp_id'];
			$empresa->emp_razsoc=$_REQUEST['emp_razsoc'];
			$empresa->emp_nit=$_REQUEST['emp_nit'];
			$empresa->emp_nomcom=$_REQUEST['emp_nomcom'];
			$empresa->emp_corfis=$_REQUEST['emp_corfis'];
			$empresa->emp_telfis=$_REQUEST['emp_telfis'];

 			$sql="UPDATE tbl_empresa set emp_razsoc='".$empresa->emp_razsoc."', emp_nit=$empresa->emp_nit, emp_nomcom='".$empresa->emp_nomcom."',emp_corfis='".$empresa->emp_corfis."', emp_telfis='".$empresa->emp_telfis."' WHERE emp_id=$empresa->emp_id";
			$this->model->editar($sql);	
			redirect(getUrl('tienda','tienda','index'));

		}




	}


?>