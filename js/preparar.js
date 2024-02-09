var ingredientes = 0;
var tam = 50;
var pan = 20;
var ori = 0;
var total = tam+pan+ori+ingredientes;
document.getElementById('impTotal').innerHTML = total;

function mTam(){
	var val = document.getElementById('tam').value;
	switch(val){
		case '1':
			tam = 30;
			break;
		case '2':
			tam = 40;
			break;
		case '3':
			tam = 50;
			break;
	}
	total = tam+pan+ori+ingredientes;
	document.getElementById('impTotal').innerHTML = total;
}

function mPan(){
	var val = document.getElementById('pan').value;
	switch(val){
		case '1':
			pan = 10;
			break;
		case '2':
			pan = 35;
			break;
		case '3':
			pan = 20;
			break;
	}
	total = tam+pan+ori+ingredientes;
	document.getElementById('impTotal').innerHTML = total;
}

function mOri(){
	var val = document.getElementById('ori').value;
	switch(val){
		case '1':
			ori = 15;
			break;
		case '2':
			ori = 10;
			break;
		case '3':
			ori = 0;
			break;
	}
	total = tam+pan+ori+ingredientes;
	document.getElementById('impTotal').innerHTML = total;
}

var activo = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
var bandera = 0;
var tamano=1;

function agregarIngrediente(ingrediente, imagen, precio){
	/* Aqui recorremos el areglo para verificar si ese ingrediente ya fue seleccionado, si si activamos bandera y si no continuamos */
	for(var i = 0; i< activo.length; i++){
		if (activo[i] == ingrediente){
			bandera++;
		}
	}

	/* Aqui seleccionamos el ingrediente del html "activo" para moverlo al cuadro de "agregados" */
	var lastResult = document.querySelector('.S'+ingrediente);

	/* Si el ingrediente no habia sido activado entramos aqui */
	if (bandera == 0){
		/* Aqui prendemos el ingrediente en la tabla de los seleccionados */
		lastResult.style.display = 'inline-block';
		/* Esto esta de mas, pero teoricamente verificamos si ese ingrediente tiene una imagen disponible y si es asi, la mostramos */
		if(imagen == 'Si'){
			var img = document.querySelector('.Ima'+ingrediente);
			img.style.display = 'inline-block';
		}
		/* Creamos una nueva bandera */
		var ban2=0;
		/* Recorremos el arreglo para asignarle un lugar al ingrediente en una posicion vacia */
		for(var i = 0; i< activo.length; i++){					
			if (activo[i] == '' && ban2==0){
				activo[i] = ingrediente;
				/* Si el ingrediente es asignado activamos la bandera para no volver a colocar el ingrediente en otra posicion */
				ban2++;
			}
		}
		/* Sumamos el valor del ingrediente al precio total (que obtuvimos en la funcion por parametros) */
		ingredientes = ingredientes+precio;
		/* Recalculamos el total */
		total = tam+pan+ori+ingredientes;
		/* Lo imprimimos en el html */
		document.getElementById('impTotal').innerHTML = total;
	}else{ /* Si el ingrediente ya habia sido seleccionado entramos aqui */
		/* Ocultamos el ingrediente de la tabla activos */
		lastResult.style.display = 'none';
		/* Si el ingrediente tenia una imagen la ocultamos tambien */
		if(imagen == 'Si'){
			var img = document.querySelector('.Ima'+ingrediente);
			img.style.display = 'none';
		}
		/* Eliminamos el ingrediente del arreglo */
		for(var i = 0; i< activo.length; i++){
			if (activo[i] == ingrediente){
				activo[i] = '';
			}
		}
		/* Restamos el valor del ingrediente al precio */
		ingredientes = ingredientes-precio;
		/* Recalculamos */
		total = tam+pan+ori+ingredientes;
		/* Imprimimos en el html */
		document.getElementById('impTotal').innerHTML = total;
		/* Limpiamos la bandera para reusarla en la proxima llamada a la funcion */
		bandera = 0;
	}
}

function addCarrito(){
	$.ajax({
		url: '../php/addCarrito.php',
		method: 'post',
		dataType: 'json',
		data: {'nproducto': total}
	})
	.done(function(respuesta){
		if (respuesta.error == 0){
			location.href = "/carrito";
		}else if (respuesta.error == 9){
			$("#nCa").html("Necesitas registrarte");
		}else{
			console.log('Revision a las condiciones de respuesta');
		}
	})
	.fail(function(respuesta){
		console.log(respuesta.responseText);
	});
}