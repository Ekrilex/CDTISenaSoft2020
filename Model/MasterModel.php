<?php 

	include_once '../Lib/Conexion.php';

	class MasterModel extends DataBase{

		private $conexion;

		public function __construct()
		{
			try{

				$this->conexion = self::conectar();

			}catch(Exception $e){

				die($e->getMessage());

			}
		}

		public function consultar($sql){

			try{

				$consulta = $this->conexion->prepare($sql);
				$consulta->execute();

				//echo "funciono la consulta<br>";

				return $consulta->fetchALL(PDO::FETCH_OBJ);


			}catch(Exception $e){

				die($e->getMessage());

			}

		}

		public function insertar($sql){

			try{

				$insercion = $this->conexion->prepare($sql);
				$insercion->execute();


				//return $insercion->fetchALL(PDO::FETCH_OBJ);
				
			}catch(Exception $e){

				die($e->getMessage());

			}
		}

		public function editar($sql){

			try{

				$insercion = $this->conexion->prepare($sql);
				$insercion->execute();

			}catch(Exception $e){

				die($e->getMessage());

			}
		}

		public function eliminar($sql){

			try{

				$insercion = $this->conexion->prepare($sql);
				$insercion->execute();

			}catch(Exception $e){

				die($e->getMessage());

			}
		}

		public function autoincrement($tabla, $campo){

			$query = "SELECT MAX(".$campo.") as codigo FROM ".$tabla."";

			try{

				$consulta = $this->conexion->prepare($query);
				$consulta->execute();
				$contador = $consulta->fetch(PDO::FETCH_OBJ);

				$autoincrementable = $contador->codigo;

				$autoincrementable++;

				return $autoincrementable;

			}catch(Exception $e){

				die($e->getMessage());

			}

		}

	}

?>