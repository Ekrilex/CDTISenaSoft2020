var peticion_http;

function inicializa_XHR(){
	if (window.XMLHttpRequest) {
		peticion_http=new XMLHttpRequest();
	}else {
		peticion_http=new ActiveXObject("Microsoft.XMLHTTP");
	}
}


function getCliente(idCli){

	/*inicializa_XHR();

	peticion_http.onreadystatechange=function(){ 

		if (peticion_http.readyState==4) {
			if (peticion_http.status==200) {

				const data = JSON.parse(peticion_http.responseText);
				document.getElementById('titulo').innerHTML="Consultar Departamento";
				document.getElementById('ttlinks').innerHTML="<a href='main.php?c=departamento'>Departamento</a>";
				document.getElementById('ttbread').innerHTML=data['dep_nombre'];
				

				document.FormEdit.idDepto.value=data['dep_id'];
				document.FormEdit.id.value=data['dep_id'];


				document.FormEdit.nombre.value=data['dep_nombre'];
				document.FormEdit.nombre.disabled = true;
				var deleteDepto=document.getElementById('deleteDepto');
				deleteDepto.innerHTML='';
				document.getElementById('btnSave').style.display = 'none'; //Oculta el botón de guardar cambios del modal


				//responseText atributo que almacena la respuesta del servidor

			}
		}

	};


	peticion_http.open('POST','ajax.php?modulo=Cliente&modulo=Cliente&funcion=consultarCliente',true);
	peticion_http.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	peticion_http.send('c=departamento&a=crud&id='+idDepto);*/

	alert("Hola");


}