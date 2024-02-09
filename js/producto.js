var precio = document.getElementById('dinero').innerHTML;
var cantidad = 1;
var modt = 3;

var valor = precio;

var imprimir = precio;
document.getElementById('num').innerHTML = cantidad;
document.getElementById('dinero').innerHTML = '$'+imprimir;

function modtam(){
	modt = document.getElementById('tam').value;
	if(modt == 3){
		precio = valor;
		imprimir = precio*cantidad;
		document.getElementById('dinero').innerHTML = '$'+imprimir;
	}else if(modt == 2){
		precio = valor-20;
		imprimir = precio*cantidad;
		document.getElementById('dinero').innerHTML = '$'+imprimir;
	}else if(modt == 1){
		precio = valor-30;
		imprimir = precio*cantidad;
		document.getElementById('dinero').innerHTML = '$'+imprimir;
	}
}

function agregar(){
	cantidad++;
	imprimir = precio*cantidad;
	document.getElementById('num').innerHTML = cantidad;
	document.getElementById('dinero').innerHTML = '$'+imprimir;
}

function quitar(){
	if (cantidad > 1){
		cantidad--;
		imprimir = precio*cantidad;
		document.getElementById('num').innerHTML = cantidad;
		document.getElementById('dinero').innerHTML = '$'+imprimir;
	}
}

function addCarrito(producto){
	$.ajax({
		url: '../php/addCarrito.php',
		method: 'post',
		dataType: 'json',
		data: {'producto': producto, 'tamano': modt, 'unidades': cantidad, 'precio': imprimir},
		beforeSend: function(){
			$("#nCa").html("agregado correctamente");
		},
	})
	.done(function(respuesta){
		if (respuesta.error == 0){
			console.log('Se ejecuto correctamente');
			$("#nCa").html("Agregar al Carrito");
		}else if (respuesta.error == 9){
			console.log('No eres cliente');
			location.href = "/registro";
		}else{
			console.log('Revision a las condiciones de respuesta');
		}
	})
	.fail(function(){
		console.log('Error al enviar los datos');
	});
}