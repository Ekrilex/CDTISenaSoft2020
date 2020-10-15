<?php 

	include_once '../Model/tbl_producto.php';

	class ProductoController {

		private $model;

		public function __construct(){

			$this->model = new tbl_producto();
		}

		public function crear(){

			include_once '../View/Producto/registrar.php';

		}

		public function guardar(){

			$producto = new tbl_producto();

			$producto->pro_id = $this->model->autoincrement("tbl_producto","pro_id");
			$producto->pro_codigo = $_REQUEST['pro_codigo'];
			$producto->pro_nombre = $_REQUEST['pro_nombre'];
			$producto->pro_marca = $_REQUEST['pro_marca'];
			$producto->pro_foto = $_FILES['pro_foto']['name'];
			$producto->pro_precio = $_REQUEST['pro_precio'];
			$producto->pro_stock = $_REQUEST['pro_stock'];
			$producto->pro_estado = 3;
			
			//$producto->pro_usu = $_REQUEST['pro_usu'];

			$producto->pro_foto = "assets/img/imagenesProductos/".$producto->pro_foto;

			move_uploaded_file($_FILES['pro_foto']['tmp_name'], $producto->pro_foto);

			$sql = "INSERT INTO tbl_producto (pro_id, pro_codigo, pro_nombre, pro_marca, pro_foto, pro_precio, pro_stock, pro_estado, pro_usu) 
			VALUES(".$producto->pro_id.",".$producto->pro_codigo.",'".$producto->pro_nombre."','".$producto->pro_marca."','".$producto->pro_foto."',".$producto->pro_precio.", ".$producto->pro_stock.",".$producto->pro_estado.", 1)";
			
			// $sql = "INSERT INTO tbl_producto (pro_id, pro_codigo, pro_nombre, pro_marca, pro_foto, pro_precio, pro_stock, pro_estado, pro_usu) 
			// VALUES(".$producto->pro_id.",".$producto->$pro_codigo.",'".$producto->pro_nombre."','".$producto->pro_marca."','".$producto->pro_foto."',".$producto->pro_precio.", ".$producto->pro_stock.",".$producto->pro_estado.",".$pro_usu.")";

			try{
				$insercion = $this->model->insertar($sql);
				$_SESSION['registrar'] = "<span class='text-Success'>el producto <b>".$producto->pro_nombre."</b> Se ha registrado satisfactoriamente</span>";

			}catch(Exception $e){

				$_SESSION['registrarError'] = "<span class='text-danger'>el producto <b>".$producto->pro_nombre."</b> no Se ha registrado satisfactoriamente</span>";

			}

			redirect(getUrl("Producto","Producto","crear"));
			

		}

		public function index(){

			$sql = "SELECT * FROM tbl_producto, tbl_usuario, tbl_estado WHERE pro_usu = usu_id AND pro_estado = est_id";

			$consultaProductos = $this->model->consultar($sql);

			include_once '../View/Producto/index.php';
		}
	}


?>