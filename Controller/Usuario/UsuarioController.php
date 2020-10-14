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

		$depto=new tbl_usuario();

		$depto->usu_nombre=$_REQUEST['usu_nombre'];
		$depto->usu_apellido=$_REQUEST['usu_apellido'];
		$depto->usu_login=$_REQUEST['usu_login'];
		$depto->usu_passwod=$_REQUEST['usu_passwod'];
		$depto->usu_telefn=$_REQUEST['usu_telefn'];
		$depto->usu_direcc=$_REQUEST['usu_direcc'];
		$depto->usu_rolid=$_REQUEST['usu_rolid'];
		$depto->usu_correo=$_REQUEST['usu_correo'];
		
		$sql="INSERT INTO tbl_usuario VALUES('NULL','".$depto->usu_nombre."','".$depto->usu_apellido."','".$depto->usu_login."','".$depto->usu_passwod."','$depto->usu_telefn','".$depto->usu_direcc."','$depto->usu_rolid','1','".$depto->usu_correo."')";
		$usuario=$this->model->insertar($sql);	

		redirect(getUrl("Usuario","Usuario","index"));
	}


	public function index(){
		$sql="SELECT * FROM tbl_usuario";
		$usuario=$this->model->consultar($sql);
		include_once '../View/Usuario/index.php';	
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