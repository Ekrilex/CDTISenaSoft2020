<?php 
	
	include_once 'Helpers.php';

	if(!isset($_SESSION['auth'])){

		redirect("../index.php?error='por favor ingrese antes de realizar alguna funcion'");

	}


?>