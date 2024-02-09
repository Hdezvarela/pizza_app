$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: '/php/Compra.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$(".list1").html(respuesta)
	})
	.fail(function(respuesta){
		console.log(respuesta.responseText);
	})
}

function busquedaActiva(){
	var valor = document.getElementById("cuadroBusqueda").innerHTML;
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
}