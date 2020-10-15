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


  $(document).on("click",".imagenn",function(){
   var url = $(this).attr("data-url");
   var id = $(this).attr("data-id");

    $.ajax({

	    url: url,
	    type: "POST",
	    data: "id="+id,
			success: function(datos){

				$('#foto').html(datos);

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


	$(document).on("submit", "#formSucursal", function(){

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

	$(document).on("submit", "#formProducto", function(){

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

	$(document).on("click",".cambiaEstadoProd",function(){

		var url = $(this).attr("data-url");
		var id = $(this).attr("data-id");
		var estado = $(this).attr("data-estado");
		var stock = $(this).attr("data-stock");

		//alert(url+" : "+id+" : "+estado);

		if(estado == 1){
				swal({
					title: 'Advertencia',
					text: "Esta Seguro de inhabilitar el producto?",
					type: 'warning',
					buttons:{
						confirm: {
							text : 'Inhabilitar',
							className : 'btn btn-success'
						},
						cancel: {
							visible: true,
							className: 'btn btn-danger'
						}
					}
				}).then((Delete) => {
					if (Delete) {

						$.ajax({

							url: url,
							type: "POST",
							data: "id="+id+"&estado="+estado+"&stock="+stock,
							success: function(datos){

								$('#bodyConsulta').html(datos);

							}

						});

						swal({
							title: 'Eliminado',
							text: 'El Producto se ha inhabilitado',
							type: 'success',
							buttons : {
								confirm: {
									className : 'btn btn-success'
								}
							}
						});
					} else {
						swal.close();
					}
				});

		}else{

			$.ajax({

				url: url,
				type: "POST",
				data: "id="+id+"&estado="+estado+"&stock="+stock,
				success: function(datos){

					$('#bodyConsulta').html(datos);

				}

			});

			swal("Cambio estado", "El producto se ha habilitado", {
				icon : "success",
				buttons: {
					confirm: {
						className : 'btn btn-success'
					}
				},
			});


		}
		// $.ajax({

		// 	url: url,
		// 	type: "POST",
		// 	data: "id="+id+"&estado="+estado+"&stock="+stock,
		// 	success: function(datos){

		// 		$('#bodyConsulta').html(datos);

		// 	}

		// });

	});

	$(document).on("keyup","#campoFiltro",function(){

		var busqueda = $(this).val();
		var url = $(this).attr("data-url");

		$.ajax({

			url: url,
			type: "POST",
			data: "busqueda="+busqueda,

			success: function(resultado){

				$('#bodyConsulta').html(resultado);

			}

		});

	});


	// function validarExtension(){

	// 	var archivo = $(this).files[0].name;

	// 	alert(archivo);
			
	// }

		});