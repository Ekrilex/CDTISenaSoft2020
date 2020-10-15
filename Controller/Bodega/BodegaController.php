<?php


require_once '../Model/tbl_bodega.php';

class BodegaController
{

	private $model;


	public function __construct()
	{
		$this->model= new  tbl_bodega();

	}

	public function index(){
		
        $_SESSION['id']=1;
        $id=$_SESSION['id'];
        $sql ="SELECT usu_sucursal FROM tbl_usuario WHERE usu_id=$id";
        $bodega=$this->model->consultar($sql);

        foreach ($bodega as $val) {
           $des=$val->usu_sucursal;
        }

		$sql="SELECT * FROM tbl_producto, tbl_bodega, tbl_detalle_producto_bodega WHERE dpb_bodid=$des AND dpb_procod=pro_codigo";
		
         //$sql="SELECT * FROM tbl_producto";
		$bodega=$this->model->consultar($sql);
        

		include_once '../View/Bodega/index.php';	
	}


	public function imagen(){
		$id=$_REQUEST['id'];
		$sql="SELECT pro_foto FROM tbl_producto WHERE pro_id=$id";
		$foto=$this->model->consultar($sql);
      foreach ($foto as $value) {
      	echo "<img src='$value->pro_foto' style='max-height:470px;max-width:470px;'>";
      }

	}

	public function csv(){
        $imagen=$_FILES['cargar']['name'];
		print_r($imagen);
	}

	
}

?>