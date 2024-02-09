var url = window.location.pathname;

if(url === "/iniciar_sesion"){
	document.getElementById('login').style.display="block";
	document.getElementById("registro").style.display="none";
}else if (url === "/registro"){
	document.getElementById("registro").style.display="block";
	document.getElementById("login").style.display="none";
}else{
	console.log('No mostramos nada');
}