var url = window.location.pathname;

if(url === "/iniciar_sesion"){
	document.getElementById('iniciar').style.display="block";
	document.getElementById("crear").style.display="none";
	document.title = "Delipizza - Iniciar sesión";
}else if (url === "/crear_cuenta"){
	document.getElementById("crear").style.display="block";
	document.getElementById("iniciar").style.display="none";
	document.title = "Delipizza - Crear cuenta";
}

$(document).on('click', '#btn_atras', function(){
	window.history.back();
});

$(document).on('click', '#ir_registro', function(){
	document.getElementById("crear").style.display="block";
	document.getElementById("iniciar").style.display="none";
	document.title = "Delipizza - Crear cuenta";
	window.history.pushState(null, "Crear cuenta", "/crear_cuenta");
});

$(document).on('click', '#ir_iniciar', function(){
	document.getElementById('iniciar').style.display="block";
	document.getElementById("crear").style.display="none";
	document.title = "Delipizza - Iniciar sesión";
	window.history.pushState(null, "Iniciar sesión", "/iniciar_sesion");
});

/* Ajax para Iniciar Sesion */
jQuery(document).on('submit', '#iniciar', function(event){
	event.preventDefault();
	jQuery.ajax({
		url: '../php/sesiones.php',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			$('#btn_ini').val('Verificando');
		}
	})
	.done(function(respuesta){
		console.log(respuesta);
		if(respuesta.error == 0){
			location.href = "/inicio";
		}else{
			document.getElementById('txt_error').innerHTML = respuesta.text;
			$('.error').slideDown('slow');
			setTimeout(function(){
				$('.error').slideUp('slow');
			}, 3000);
			$('#btn_ini').val('Iniciar Sesión');
		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	});
});

/* Ajax para Crear Cuenta */
jQuery(document).on('submit', '#crear', function(event){
	event.preventDefault();
	jQuery.ajax({
		url: '../php/sesiones.php',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			$('#btn_cre').val('Creando perfil');
		}
	})
	.done(function(respuesta){
		console.log(respuesta);
		if(respuesta.error == 0){
			location.href = "/inicio";
		}else{
			document.getElementById('txt_error').innerHTML = respuesta.text;
			$('.error').slideDown('slow');
			setTimeout(function(){
				$('.error').slideUp('slow');
			}, 3000);
			$('#btn_cre').val('Crear Cuenta');
		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	});
});