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
		
        $id=$_SESSION['id'];
        $sql ="SELECT usu_sucursal FROM tbl_usuario WHERE usu_id=$id";
        $bodega=$this->model->consultar($sql);

        foreach ($bodega as $val) {
           $des=$val->usu_sucursal;
        }

		$sql="SELECT * FROM tbl_producto,tbl_detalle_producto_bodega, tbl_usuario, tbl_estado WHERE pro_usu = usu_id AND pro_estado = est_id AND pro_id = dpb_procod AND dpb_bodid = ".$_SESSION['bodega']."";
		
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

	   $ruta="archivos/$imagen";
       move_uploaded_file($_FILES['cargar']['tmp_name'],$ruta);
            
	   $archivo = fopen("$ruta","r");
	   $con=0;

     
      $sql="SELECT * FROM tbl_producto";
      $productos=$this->model->consultar($sql);


       while(($datos = fgetcsv($archivo, ",")) == true){
        

        $sql="SELECT * FROM tbl_producto WHERE pro_codigo='$datos[0]'";   
        $producto=$this->model->consultar($sql);


        if (count($producto)>0) {

        $sql="SELECT * FROM tbl_producto WHERE pro_codigo='$datos[0]'";   
        $pro=$this->model->consultar($sql);

         foreach ($pro as $value) {
	     $t=$value->pro_stock;
         $nuevo=$datos[5]+$t;
	     $sql="UPDATE tbl_producto set pro_stock = '$nuevo' WHERE pro_codigo='$datos[0]'";
         $actualiza=$this->model->editar($sql);
	     }

        }else{
                 
           $id=$this->model->autoincrement("tbl_producto","pro_id"); 

           $sql="INSERT INTO tbl_producto VALUES('$id','$datos[0]', '$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";

           $ingresa=$this->model->insertar($sql);        	
        }   

	  }

      redirect(getUrl("Bodega","Bodega","index"));
      $_SESSION['cambios']="Stock Actualizado";

    }
	
}

?>