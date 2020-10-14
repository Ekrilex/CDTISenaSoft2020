$(document).ready(function(){

	$(document).on("submit", "#formRegistrarCliente", function(){

		var retorno = true;

		// var nit = $('#nit').value;
		// var nombre = $('#nombre').value;
		// var apellido = $('#apellido').value;
		// var direccion = $('#direccion').value;
		// var celular = $('#celular').value;
		// var correo = $('#correo').value;

		var camposNoVacio = document.getElementsByClassName('novacio');

		//console.log(camposNoVacio);

		//alert('hay campos vacios');
		var contador = 0;

		for(var i = 0; i<camposNoVacio.length; i++){

			if(camposNoVacio[i].value.length < 1){
				contador++;
				retorno = false;

			}

		}

		if(contador > 0){
			$('#errorVacio').html("<span class='text-danger'>Por Favor no deje Campos Vacios</span>");
			
		}

		

		return retorno;

	});


});