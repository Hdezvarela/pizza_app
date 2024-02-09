$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: '../php/buscar.php',
		type: 'POST',
		dataType: 'json',
		data: {'consulta': consulta, 'tipo': 'bebida'},
	})
	.done(function(respuesta){
		let res = document.querySelector('.prod');
		res.innerHTML = '';
		for(let item of respuesta){
			res.innerHTML += `
				<div class="caja">
					<div class="imgpizza" style="background-image: url(/img/producto/${item.id}.png);"></div>
					<a href="/pizzas/${item.id}"><p class="titpizza">${item.nombre}</p></a>
					<hr class="sepizza">
					<p class="infpizza">${item.descripcion}</p>
					<hr class="sepizza">
					<p class="price">$ ${item.precio}</p>
					<p class="tam">Grande</p>
					<div class="addcar" onclick="addCarrito(${item.id},${item.precio})"></div>
				</div>
			`
		}
	})
	.fail(function(){
		let res = document.querySelector('.prod');
		res.innerHTML = '<div class="noresultados">No se encontraron resultados.</div>';
	})
}

$(document).on('keyup', '#buscar', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});