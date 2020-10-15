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
			$producto->pro_usu = $_REQUEST['pro_usu'];

			$producto->pro_foto = "assets/img/imagenesProductos/".$producto->pro_foto;

			move_uploaded_file($_FILES['pro_foto']['tmp_name'], $producto->pro_foto);

			$sql = "INSERT INTO tbl_producto (pro_id, pro_codigo, pro_nombre, pro_marca, pro_foto, pro_precio, pro_stock, pro_estado, pro_usu) 
			VALUES(".$producto->pro_id.",".$producto->pro_codigo.",'".$producto->pro_nombre."','".$producto->pro_marca."','".$producto->pro_foto."',".$producto->pro_precio.", ".$producto->pro_stock.",".$producto->pro_estado.", ".$producto->pro_usu.")";

			$dbp_id = $this->model->autoincrement("tbl_detalle_producto_bodega","dpb_id");

			$sqlBodega = "INSERT INTO tbl_detalle_producto_bodega VALUES(".$dbp_id.",".$_SESSION['bodega'].",".$producto->pro_id.",".$_SESSION['sucursal'].")";
			
			// $sql = "INSERT INTO tbl_producto (pro_id, pro_codigo, pro_nombre, pro_marca, pro_foto, pro_precio, pro_stock, pro_estado, pro_usu) 
			// VALUES(".$producto->pro_id.",".$producto->$pro_codigo.",'".$producto->pro_nombre."','".$producto->pro_marca."','".$producto->pro_foto."',".$producto->pro_precio.", ".$producto->pro_stock.",".$producto->pro_estado.",".$pro_usu.")";

			try{
				$insercion = $this->model->insertar($sql);
				$insercionBodega = $this->model->insertar($sqlBodega);
				$_SESSION['registrar'] = "<span class='text-Success'>el producto <b>".$producto->pro_nombre."</b> Se ha registrado satisfactoriamente</span>";

			}catch(Exception $e){

				$_SESSION['registrarError'] = "<span class='text-danger'>el producto <b>".$producto->pro_nombre."</b> no Se ha registrado satisfactoriamente</span>";

			}

			redirect(getUrl("Producto","Producto","crear"));
			

		}

		public function index(){
        
			$sql = "SELECT * FROM tbl_producto,tbl_detalle_producto_bodega, tbl_usuario, tbl_estado WHERE pro_usu = usu_id AND pro_estado = est_id AND pro_id = dpb_procod AND dpb_bodid = ".$_SESSION['bodega']."";

			$consultaProductos = $this->model->consultar($sql);

			include_once '../View/Producto/index.php';
		}

		public function editar(){

			$pro_id = $_REQUEST['pro_id'];

			$sql = "SELECT * FROM tbl_producto WHERE pro_id = ".$pro_id."";

			$productoConsultado = $this->model->consultar($sql);

			include_once '../View/Producto/editar.php';

		} 

		public function actualizar(){

			$producto = new tbl_producto();

			$producto->pro_id = $_REQUEST['pro_id']; 
			$producto->pro_codigo = $_REQUEST['pro_codigo']; 



			$producto->pro_nombre = $_REQUEST['pro_nombre']; 
			$producto->pro_marca = $_REQUEST['pro_marca']; 

			if($_FILES['pro_foto']['name'] && !file_exists("assets/img/imagenesProductos".$_FILES['pro_foto']['name'])){

				$producto->pro_foto = $_FILES['pro_foto']['name'];
				$producto->pro_foto = "assets/img/imagenesProductos/".$producto->pro_foto;

				move_uploaded_file($_FILES['pro_foto']['tmp_name'], $producto->pro_foto);

			}else{
				$producto->pro_foto = $_REQUEST['pro_foto_antigua']; 
			}

			$producto->pro_precio = $_REQUEST['pro_precio']; 
			$producto->pro_stock = $_REQUEST['pro_stock']; 
			//$producto->pro_usu = $_REQUEST['pro_usu']; 

			$sql = "UPDATE tbl_producto 
			SET pro_codigo = ".$producto->pro_codigo.",
				pro_nombre = '".$producto->pro_nombre."',
				pro_marca = '".$producto->pro_marca."',
				pro_foto = '".$producto->pro_foto."',
				pro_precio = ".$producto->pro_precio.",
				pro_stock = ".$producto->pro_stock." WHERE pro_id = ".$producto->pro_id."";

				try{

					$actualizacion = $this->model->editar($sql);
					$_SESSION['editar'] = "<span class='text-danger'>El Producto <b>".$producto->pro_nombre."</b> Se ha Actualizado satisfactoriamente</span>";


				}catch(Exception $e){
					$_SESSION['editarError'] = "<span class='text-danger'>El Producto <b>".$producto->pro_nombre."</b> Se ha Actualizado satisfactoriamente</span>";

				}

				redirect(getUrl("Producto","Producto","index"));

		}

		public function cambiarEstado(){

			$pro_id = $_REQUEST['id'];
			$estado = $_REQUEST['estado'];
			$stock = $_REQUEST['stock'];

			if($estado == 1){

				$sql = "UPDATE tbl_producto SET pro_estado = 2 WHERE pro_id = ".$pro_id.""; 
			}else{

				if($stock > 10){

					$idEstado = 3;

				}else if($stock > 0){

					$idEstado = 4;

				}else{

					$idEstado = 5;
				}

				$sql = "UPDATE tbl_producto SET pro_estado = ".$idEstado." WHERE pro_id = ".$pro_id."";

			}

			$cambioDeEstado = $this->model->editar($sql);

			$sqlConsulta = "SELECT * FROM tbl_producto,tbl_detalle_producto_bodega, tbl_usuario, tbl_estado WHERE pro_usu = usu_id AND pro_estado = est_id AND pro_id = dpb_procod AND dpb_bodid = ".$_SESSION['bodega']."";

			$consultaProductos = $this->model->consultar($sqlConsulta);

			include_once '../View/Producto/cambiaEstado.php';
		}

		public function filtrar(){

			$busqueda = $_REQUEST['busqueda'];

			$sql = "SELECT * FROM tbl_producto, tbl_detalle_producto_bodega,tbl_usuario, tbl_estado WHERE pro_usu = usu_id AND pro_estado = est_id AND pro_id = dpb_procod AND dpb_bodid = ".$_SESSION['bodega']." AND (pro_nombre LIKE '%".$busqueda."%' OR pro_marca LIKE '%".$busqueda."%' OR pro_codigo LIKE '%".$busqueda."%' OR pro_precio LIKE '%".$busqueda."%')";

			$consultaProductos = $this->model->consultar($sql);

			include_once '../View/Producto/resultadoFiltro.php';

		}
	}


?>