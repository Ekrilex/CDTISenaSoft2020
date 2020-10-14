<?php


require_once '../Model/Usuario/UsuarioModel.php';

class UsuarioController
{

	private $model;


	public function __construct()
	{
		$this->model= new  tbl_usuario();

	}


	public function getCreate(){				
		
		$sql="SELECT * FROM tbl_rol";
		$rol=$this->model->consultar($sql);
		include_once '../View/Usuario/create.php';
	}


/*	public function crud(){
		
		$depto=new Departamento();
		
		if(isset($_REQUEST['id'])){
			$depto=$this->model->getDepartamento($_REQUEST['id']);
		}
		print json_encode($depto);
	}
*/


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
		
		$sql="INSERT INTO tbl_usuario VALUES('$id','".$usuario->usu_nombre."','".$usuario->$usu_apelld."','".$usuario->usu_login."','".$usuario->usu_passwod."','$usuario->usu_telefn','".$usuario->usu_direcc."','$usuario->usu_rolid','1','".$usuario->usu_correo."')";
		$usuarios=$this->model->insertar($sql);	

		redirect(getUrl("Usuario","Usuario","index"));
	}


	public function index(){
		$sql="SELECT * FROM tbl_usuario as u , tbl_rol as r WHERE u.usu_rolid=r.rol_id";
		$usuario=$this->model->consultar($sql);

		include_once '../View/Usuario/index.php';	
	}

	public function getUpdate(){

		$id=$_GET['usu_id'];

		$sql="SELECT * FROM tbl_usuario as u , tbl_rol as r WHERE u.usu_rolid=r.rol_id AND usu_id=$id";
		$usuario=$this->model->consultar($sql);

		$sql="SELECT * FROM tbl_rol";
		$roles=$this->model->consultar($sql);

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
		
        $sql="UPDATE tbl_usuario set usu_nombre='".$usuario->usu_nombre."' , usu_apelld='".$usuario->usu_apelld."', usu_telefn='$usuario->usu_telefn', usu_direcc='".$usuario->usu_direcc."' , usu_rolid='$usuario->usu_rolid', usu_correo='".$usuario->usu_correo."' WHERE usu_id='$usuario->usu_id'";
		$usuarios=$this->model->editar($sql);	

		redirect(getUrl("Usuario","Usuario","index"));
	}

	
	public function postDelete(){

		//0 = inhabilitado y 1= habilitado//

		$usuario=new tbl_usuario();

		$usuario->usu_id=$_REQUEST['cli_id'];      
		$usuario->usu_estado=$_REQUEST['estado'];
		
		echo "<script>alert('".$usuario->usu_id." : ".$usuario->usu_estado."')</script>";
        if ($usuarios->usu_estado==1) {
        $sql="UPDATE tbl_usuario set usu_estado='1' WHERE usu_id='$usuario->usu_id'";
       
        }else if ($usuarios->usu_estado==2){
        $sql="UPDATE tbl_usuario set usu_estado='2' WHERE usu_id='$usuario->usu_id'";
        }

		$usuarioss=$this->model->editar($sql);

        $sql="SELECT * FROM tbl_usuario as u , tbl_rol as r WHERE u.usu_rolid=r.rol_id";
		$usuario=$this->model->consultar($sql);
		
		include_once '../view/Usuario/cambiarEstado.php';

	
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