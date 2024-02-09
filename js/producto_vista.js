function addCarrito(producto, precio){
	$.ajax({
		url: '../php/addCarrito.php',
		method: 'post',
		dataType: 'json',
		data: {'mproducto': producto, 'mprecio': precio}
	})
	.done(function(respuesta){
		if (respuesta.error == 0){
			$.notify("Se agrego al carrito", "success");
			console.log('Se ejecuto correctamente');
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