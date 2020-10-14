<?php 

	class DataBase {

		private static $tipoConexion;
		private static $dbname;
		private static $host;
		private static $port;
		private static $user;
		private static $password;
		private static $conexion;

		public static function conectar()
		{

			include 'conf/config.php';

			self::$tipoConexion = $tipoConexion;
			self::$dbname = $dbname;
			self::$host = $host;
			self::$port = $port;
			self::$user = $user;
			self::$password = $password;

			self::$conexion = new PDO("".self::$tipoConexion.":dbname=".self::$dbname.";host=".self::$host.";port=".self::$port."",self::$user, self::$password);

			self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return self::$conexion;
		}

		
		public static function cerrar()
		{
			self::$conexion = null;
		}

	}

	try{

		$pruebaConexion = DataBase::conectar();
		
	}catch(Exception $e){
	
		die($e->getMessage());
	}


?>