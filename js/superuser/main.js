$(buscar_datos());

function buscar_empleado(consulta){
	$.ajax({
		url: '../../vista/supuser/salida/salida.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){

	})
}