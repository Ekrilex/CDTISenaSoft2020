<?php


require_once '../Model/tbl_bodega.php';

class BodegaController
{

	private $model;


	public function __construct()
	{
		$this->model= new  tbl_bodega();

	}


/*	public function getCreate(){				
		
		$sql="SELECT * FROM tbl_rol";
		$rol=$this->model->consultar($sql);
         
        $sql = "SELECT * FROM tbl_sucursal";
        $sucu=$this->model->consultar($sql);

		include_once '../View/Usuario/create.php';
	}

*/

/*
	public function postCreate(){


		//0 = inhabilitado y 1= habilitado//

		$usuario=new tbl_usuario();
        $id=$this->model->autoincrement("tbl_usuario","usu_id"); 
		$usuario->usu_nombre=$_REQUEST['usu_nombre'];
		$usuario->usu_apelld=$_REQUEST['usu_apellido'];
		$usuario->usu_login=$_REQUEST['usu_login'];
		$usuario->usu_passwod=$_REQUEST['usu_passwod'];
		$usuario->usu_telefn=$_REQUEST['usu_telefn'];
		$usuario->usu_direcc=$_REQUEST['usu_direcc'];
		$usuario->usu_rolid=$_REQUEST['usu_rolid'];
		$usuario->usu_correo=$_REQUEST['usu_correo'];
		$usuario->usu_sucursal=$_REQUEST['usu_sucursal'];
		
		$sql="INSERT INTO tbl_usuario VALUES('$id','".$usuario->usu_nombre."','".$usuario->$usu_apelld."','".$usuario->usu_login."','".$usuario->usu_passwod."','$usuario->usu_telefn','".$usuario->usu_direcc."','$usuario->usu_rolid','1','".$usuario->usu_correo."','$usuario->usu_sucursal')";
		$usuarios=$this->model->insertar($sql);	

		redirect(getUrl("Usuario","Usuario","index"));
	}
*/

	public function index(){
		$sql="SELECT * FROM tbl_producto as p, tbl_bodega as b, tbl_detalle_producto_bodega as d WHERE d.dpb_bodid=b.bod_id AND d.dpb_procod = p.pro_codigo";
		
         //$sql="SELECT * FROM tbl_producto";
		$bodega=$this->model->consultar($sql);

		include_once '../View/Bodega/index.php';	
	}

/*	public function getUpdate(){

		$id=$_GET['usu_id'];

		$sql="SELECT * FROM tbl_usuario as u , tbl_rol as r WHERE u.usu_rolid=r.rol_id AND usu_id=$id";
		$usuario=$this->model->consultar($sql);

		$sql="SELECT * FROM tbl_rol";
		$roles=$this->model->consultar($sql);

		$sql = "SELECT * FROM tbl_sucursal";
        $sucu=$this->model->consultar($sql);

		include_once '../View/Usuario/update.php';	
	}


	public function postUpdate(){

		//0 = inhabilitado y 1= habilitado//

		$usuario=new tbl_usuario();
		$usuario->usu_id=$_REQUEST['usu_id'];      
		$usuario->usu_nombre=$_REQUEST['usu_nombre'];
		$usuario->usu_apelld=$_REQUEST['usu_apellido'];
		$usuario->usu_telefn=$_REQUEST['usu_telefn'];
		$usuario->usu_direcc=$_REQUEST['usu_direcc'];
		$usuario->usu_rolid=$_REQUEST['usu_rolid'];
		$usuario->usu_correo=$_REQUEST['usu_correo'];
		$usuario->usu_sucursal=$_REQUEST['usu_sucursal'];
		
        $sql="UPDATE tbl_usuario set usu_nombre='".$usuario->usu_nombre."' , usu_apelld='".$usuario->usu_apelld."', usu_telefn='$usuario->usu_telefn', usu_direcc='".$usuario->usu_direcc."' , usu_rolid='$usuario->usu_rolid', usu_correo='".$usuario->usu_correo."', usu_sucursal='$usuario->usu_sucursal' WHERE usu_id='$usuario->usu_id'";
		$usuarios=$this->model->editar($sql);	

		redirect(getUrl("Usuario","Usuario","index"));
	}

	
	public function postDelete (){

		//0 = inhabilitado y 1= habilitado//

		$usu_id=$_REQUEST['usu_id'];      
		$usu_estado=$_REQUEST['usu_estado'];
		
		//echo $usu_id ." , ".$usu_estado;

		//echo "<script>alert('".$usu_id." : ".$usu_estado."')</script>";
  
       if ($usu_estado==1) {
        $sql="UPDATE tbl_usuario set usu_estado='2' WHERE usu_id='$usu_id'";
		$usuarioss=$this->model->editar($sql);
       
        }else if ($usu_estado==2){
        $sql="UPDATE tbl_usuario set usu_estado='1' WHERE usu_id='$usu_id'";
        		$usuarioss=$this->model->editar($sql);

        }

		$sql="SELECT * FROM tbl_usuario as u , tbl_rol as r WHERE u.usu_rolid=r.rol_id";

		$usuario=$this->model->consultar($sql);
		
	    include_once '../View/Usuario/CambiarEstado.php';

	
	}
   
/*
	public function inactivar(){

		$this->model->inactivarDepartamento($_REQUEST['id']);
		//Respuesta del controlador
		include('../view/departamento/departamentoSelect.php');
	}
*/

	
}

?>