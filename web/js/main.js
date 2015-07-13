$(function(){
	//alert("Ejemplo de prueba de alerta!");

	//Obteniendo el evento de click sobre el boton Inscribir Persona a Evento
	//del index.php de la vista persona-evento
	$('#modalButton').click(function() {//#modalButton id del boton
		$('#modal').modal('show')//#modal id del modelo ->  Modal::begin(...code...) en index.php de la vista persona-evento
			.find('#modalContent')//#modalContent  id del contenedor div que esta despues de Modal::begin(...code...) 
			.load($(this).attr('value'));
	});

	$("#personaubicacion-ubicacion_idubicacion").prop("disabled", true);
	$("#personaubicacion-ubicacion_idubicacion").attr('title', 'Si desea cambiar de ubicación por favor realice una nueva inscripción y elimine ésta inscripción.');

	$("#persona-hotel").attr('title', 'Nombre del hotel donde se hospeda');
});