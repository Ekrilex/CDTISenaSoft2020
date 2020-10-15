var peticion_http;

function inicializa_XHR(){
	if (window.XMLHttpRequest) {
		peticion_http=new XMLHttpRequest();
	}else {
		peticion_http=new ActiveXObject("Microsoft.XMLHTTP");
	}
}


function getCliente(){

	inicializa_XHR();


	idCli=document.getElementById('cedula').value;


	peticion_http.onreadystatechange=function(){ 

		if (peticion_http.readyState==4) {
			if (peticion_http.status==200) {
				
				const data = JSON.parse(peticion_http.responseText);
				
				

						document.getElementById('nombre').value=data[0]['cli_nombre'];
						document.getElementById('telefono').value=data[0]['cli_telefn'];
				
			}
		}

	};


	peticion_http.open('GET','ajax.php?modulo=cliente&controlador=cliente&funcion=getCliente&cli_nit='+idCli,true);
	peticion_http.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	peticion_http.send(null);
	
	

}