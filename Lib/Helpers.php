<?php 
	session_start();

	function redirect($url){ //funcion para direccionar a la url definida
		echo "<script>"
		."window.location.href='".$url."'"
		."</script>";
	}

	function dd($var){ //definir si alguna variable existe
		echo "<pre>";
		die(print_r($var));
	}

	function getUrl($modulo, $controlador, $funcion, $parametros = false, $pagina = false){ //funcion que retorna la url a la que se quiere llegar dividida en modulo, controlador = archivo y  funcion = metodo de la clase

		if($pagina == false){
			$pagina = "index";
		}

		$url = $pagina.".php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

		if($parametros!=false){
			foreach ($parametros as $columna => $valor) {

					$url.="&".$columna."=".$valor."";

			}

		}

		return $url;
	}

	function resolve(){ //validacion de si la ruta especificada existe en las carpetas y archivos del proyecto, ejecutando tambien la funcion que se quiera utilizar en le controlador 

		$modulo = ucwords($_GET['modulo']); //Ciudad
		$controlador = ucwords($_GET['controlador']); //Ciudad
		$funcion = $_GET['funcion']; //getCreate


		if(is_dir("../controller/$modulo")){
			if(file_exists("../controller/$modulo/".$controlador."Controller.php")){

				include_once "../controller/$modulo/".$controlador."Controller.php";

				$nombreClase = $controlador."Controller";

				$objClase = new $nombreClase();

				if(method_exists($objClase, $funcion)){
					$objClase->$funcion();
					
				}else{
					echo "la funcion especificada no existe";
				}

			}else{
				echo "el archivo especificado no existe";
			}

		}else{
			echo "el modulo especificada no existe";
		}

	}



?>