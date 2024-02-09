//Ajax para Iniciar Sesion
jQuery(document).on('submit', '#formlogin', function(event){
	event.preventDefault();

	jQuery.ajax({
		url: '../php/sessions.php',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			$('#btnli').val('Validando Datos!...');
		}
	})
	.done(function(respuesta){
		console.log(respuesta);
		if (respuesta.error == 0){
			location.href = "/admin/productos";
		}else if (respuesta.error == 1){
			$('.empERROR').slideDown('slow');
			setTimeout(function(){
				$('.empERROR').slideUp('slow');
			}, 3000);
			$('#btnli').val('Iniciar Sesión');
		}else{
			$('.datERROR').slideDown('slow');
			setTimeout(function(){
				$('.datERROR').slideUp('slow');
			}, 3000);
			$('#btnli').val('Iniciar Sesión');
		}
	})
	.fail(function(respuesta){
		console.log(respuesta.responseText);
	})
	.always(function(){
		console.log("complete");
	});
});