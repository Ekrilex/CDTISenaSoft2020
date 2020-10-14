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
		require_once '../View/Usuario/create.php';
	}

/*
	public function crud(){
		
		$depto=new Departamento();
		
		if(isset($_REQUEST['id'])){
			$depto=$this->model->getDepartamento($_REQUEST['id']);
		}
		print json_encode($depto);
	}
*/


	public function postCreate(){

		$depto->usu_nombre=$_REQUEST['nombre'];
		$depto->usu_apellido=$_REQUEST['apellido'];
		$depto->_nombre=$_REQUEST[''];
		$depto->dep_id=$_REQUEST['id'];
		$depto->dep_nombre=$_REQUEST['nombre'];
		$depto->dep_id=$_REQUEST['id'];
		$depto->dep_nombre=$_REQUEST['nombre'];


		
		//Captura de datos
	/*	$depto=new Departamento();
		$nuevo_depto=new Departamento();
		

		$depto->dep_id=$_REQUEST['id'];
		$depto->dep_nombre=$_REQUEST['nombre'];



		//Ingreso de nuevo Departamento
		$nuevo_depto=$this->model->getDepartamentoName($_REQUEST['nombre']);
		
		
		if(isset($nuevo_depto->dep_nombre) && $depto->dep_id==null)
		{
			echo "<p class='text-danger h3'>El Departamento ya esta registrado</p>";
		}else
		{
			$this->model->insertarDepartamento($depto);
		}


		//Editar Departamento
		$depto->dep_id>0 ? $this->model->actualizarDepartamento($depto):"";
		
		//Respuesta del controlador
		include('../view/departamento/departamentoSelect.php');
	*/
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