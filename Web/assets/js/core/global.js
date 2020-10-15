$(document).ready(function(){


	//Funciones Del modulo de usuarios
	$(document).on("submit", "#formCliente", function(){

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

	$(document).on("click",".cambiaEstado",function(){

		var url = $(this).attr("data-url");
		var id = $(this).attr("data-id");
		var estado = $(this).attr("data-estado");

		//alert(url+" : "+id+" : "+estado);

		$.ajax({

			url: url,
			type: "POST",
			data: "cli_id="+id+"&estado="+estado,
			success: function(datos){
                  
				$('#tbodyConsultarCliente').html(datos);

			}

		});

	});


	$(document).on("click",".estadoUsuario",function(){

		var url = $(this).attr("data-url");
		var id = $(this).attr("data-id");
		var estado = $(this).attr("data-estado");

		//alert(url+" : "+id+" : "+estado);

		$.ajax({

			url: url,
			type: "POST",
			data: "usu_id=" + id + "&usu_estado=" + estado,
			success: function(datos){
                  //alert(datos);
				$('tbody').html(datos);

			}

		});

	});


	/////////////////Fin jquery cliente///////////////////////


	$(document).on("click",".cambiaEstado",function(){

		var url = $(this).attr("data-url");
		var id = $(this).attr("data-id");
		var estado = $(this).attr("data-estado");

		//alert(url+" : "+id+" : "+estado);

		$.ajax({

			url: url,
			type: "POST",
			data: "emp_id="+id+"&estado="+estado,
			success: function(datos){

				$('#tbodyConsultarEmpresa').html(datos);

			}

		});

	});

	$(document).on("click",".cambiaEstado",function(){

		var url = $(this).attr("data-url");
		var id = $(this).attr("data-id");
		var estado = $(this).attr("data-estado");

		//alert(url+" : "+id+" : "+estado);

		$.ajax({

			url: url,
			type: "POST",
			data: "id="+id+"&estado="+estado,
			success: function(datos){

				$('#tbodyConsultar').html(datos);

			}

		});

	});

////Factura///////////////

	$(document).on("blur",".xxxxxx",function(){

		var url = $(this).attr("data-url");
		var cli_nit = $(this).attr("value");
		
		alert(cli_nit);

		$.ajax({

			url: url,
			type: "POST",
			data: "cli_nit="+cli_nit,
			success: function(datos){

				$('#tbodyConsultar').html(datos);

			}

		}); 

	});






});