$(document).on('ready', function() 
{

	//---## TRAE TIPO PROPIEDADES ##---//
	$.ajax({
		url: '/tipopropiedades',
		dataType: 'json',
		success: function(data) {
			$("#select-tipopropiedad").empty(); // Remove all <option> child tags.
		    $.each(data.tipopropiedades, function(index, item) { // Iterates through a collection
		        $("#select-tipopropiedad").append( // Append an object to the inside of the select box
		            $("<option></option>") // Yes you can do this.
		                .text(item.tipopropiedad)
		                .val(item.id)
		        );
		    });

		    $("#select-tipopropiedad-2").empty(); // Remove all <option> child tags.
		    $.each(data.tipopropiedades, function(index, item) { // Iterates through a collection
		        $("#select-tipopropiedad-2").append( // Append an object to the inside of the select box
		            $("<option></option>") // Yes you can do this.
		                .text(item.tipopropiedad)
		                .val(item.id)
		        );
		    });
		}
	});

	//---## TRAE EL TIPO DE OPERACIONES ##---//
	$.ajax({
		url: '/operaciones',
		dataType: 'json',
		success: function(data) {
			$("#select-operaciones").empty(); // Remove all <option> child tags.
		    $.each(data.operaciones, function(index, item) { // Iterates through a collection
		        $("#select-operaciones").append( // Append an object to the inside of the select box
		            $("<option></option>") // Yes you can do this.
		                .text(item.operacion)
		                .val(item.id)
		        );
		    });

		    $("#select-operaciones-2").empty(); // Remove all <option> child tags.
		    $.each(data.operaciones, function(index, item) { // Iterates through a collection
		        $("#select-operaciones-2").append( // Append an object to the inside of the select box
		            $("<option></option>") // Yes you can do this.
		                .text(item.operacion)
		                .val(item.id)
		        );
		    });
		}
	});
	
	
	//---############################---//
	$.ajax({
		url: '/files',
		type: 'GET',
		beforeSend : function(data) {
			$('#destacadas').html('<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><h3>Cargando...</h3>');
		},
		success : function(data){
			$('#destacadas').empty();
			$('#destacadas').html(data.datos);
			$('#paginador').html(data.links);
		}

	});
	//---############################---//
	//---## ESTO ES PARA LA PAGINACION CON AJAX ##---//
	//---## EN LAS PROPIEDADES DESTACADAS ########---//
	$(document).on('click', '.pagination a', function(e){
	 	e.preventDefault();
		var pagina = $(this).attr('href').split('page=')[1];
		var path = '/files';
		console.log(path+pagina);
		$.ajax({
			url: path,
			type: 'GET',
			dataType: 'json',
			data: {page: pagina},
			success: function(data){
				$('#destacadas').html(data.datos);
				$('#paginador').html(data.links);
			}
		});
	});


	//---## BUSQUEDA RAPIDA ##---//
	$('#busqueda-1').on('click', function(event) {
		var busqueda = {
			'codigo'        : $('#busqueda-1-codigo').val(),
			'tipopropiedad' : $('#select-tipopropiedad').val(),
			'operacion'     : $('#select-operaciones').val()
		}
		$.ajax({
			url: '/busqueda-1',
			type: 'POST',
			dataType: 'json',
			data: {busqueda: JSON.stringify(busqueda)},
			success: function(data) {
				if (data.success=='codigo'){
					window.location.href = '/propiedades/'+data.codigo;
				} else if (data.success=='busqueda') {
					window.location.href = '/busqueda/'+data.operacion_id+'/'+data.tipopropiedad_id;
				} else {
					alert(data.msj);
				}

			}
		});

	});

	//---## BUSQUEDA RAPIDA 2##---//
	$('#busqueda-2').on('click', function(event) {
		var busqueda = {
			'codigo'        : $('#busqueda-2-codigo').val(),
			'tipopropiedad' : $('#select-tipopropiedad-2').val(),
			'operacion'     : $('#select-operaciones-2').val()
		}
		$.ajax({
			url: '/busqueda-1',
			type: 'POST',
			dataType: 'json',
			data: {busqueda: JSON.stringify(busqueda)},
			success: function(data) {
				if (data.success=='codigo'){
					window.location.href = '/propiedades/'+data.codigo;
				} else if (data.success=='busqueda') {
					window.location.href = '/busqueda/'+data.operacion_id+'/'+data.tipopropiedad_id;
				} else {
					alert(data.msj);
				}

			}
		});

	});



	//---###### MAILS DESDE INDEX #######---//
	$('#mensaje-index').on('submit', function(event){
		event.preventDefault();
		var MENSAJE = {
			'nombre'  : $('#nombre').val(),
			'asunto'  : $('#asunto').val(),
			'email'   : $('#email').val(),
			'mensaje' : $('#mensaje').val()
		}
		$.ajax({
			url: '/mail/send',
			type: 'POST',
			dataType: 'json',
			data: {'MENSAJE': JSON.stringify(MENSAJE)},
			beforeSend: function(data){
				 $("#spinner-loading").trigger("click");//abre el spinner-loading//
			},
			success: function(data){
				if (data.success==true) {
					$("#wrapper-content").waitMe('hide');//cierra el spinner-loading//
					alert(data.msj);
					$(':text').val('');
					$('#mensaje').val('');
				} else{
					$("#wrapper-content").waitMe('hide');//cierra el spinner-loading//
					alert(data.msj);
					$('#nombre').focus();					
					$('#nombre').select();
				};
				
			}
		});
		return false;
	});

	//---###### MAILS DESDE EL DETALLE DE LA PROPIEDAD #######---//
	$('#mensaje-detalle').on('submit', function(event){
		event.preventDefault();
		var MENSAJE = {
			'nombre'  : $('#nombre').val(),
			'asunto'  : $('#asunto').val(),
			'email'   : $('#email').val(),
			'mensaje' : $('#mensaje').val()
		}
		$.ajax({
			url: '/mail/send',
			type: 'POST',
			dataType: 'json',
			data: {'MENSAJE': JSON.stringify(MENSAJE)},
			beforeSend: function(data){
				 $("#spinner-loading").trigger("click");//abre el spinner-loading//
			},
			success: function(data){
				if (data.success==true) {
					$("#wrapper-content").waitMe('hide');//cierra el spinner-loading//
					alert(data.msj);
					$(':text').val('');
					$('#mensaje').val('');
				} else{
					$("#wrapper-content").waitMe('hide');//cierra el spinner-loading//
					alert(data.msj);
					$('#nombre').focus();					
					$('#nombre').select();
				};
				
			}
		});
		return false;
	});


	//---###### MAILS DESDE EL FORMULARIO DE CONTACTO #######---//
	$('#mensaje-contacto').on('submit', function(event){
		event.preventDefault();
		var MENSAJE = {
			'nombre'  : $('#nombre').val(),
			'asunto'  : $('#asunto').val(),
			'email'   : $('#email').val(),
			'mensaje' : $('#mensaje').val()
		}
		$.ajax({
			url: '/mail/send',
			type: 'POST',
			dataType: 'json',
			data: {'MENSAJE': JSON.stringify(MENSAJE)},
			beforeSend: function(data){
				 $("#spinner-loading").trigger("click");//abre el spinner-loading//
			},
			success: function(data){
				if (data.success==true) {
					$("#wrapper-content").waitMe('hide');//cierra el spinner-loading//
					alert(data.msj);
					$(':text').val('');
					$('#mensaje').val('');
				} else{
					$("#wrapper-content").waitMe('hide');//cierra el spinner-loading//
					alert(data.msj);
					$('#nombre').focus();					
					$('#nombre').select();
				};
				
			}
		});
		return false;
	});


var current_effect = 'win8';
$('#spinner-loading').click(function(){
	run_waitMe(current_effect);
});

function run_waitMe(efecto){

	$('#wrapper-content').waitMe({
		effect: efecto,
		text: 'Enviando e-mail...',
		bg: 'rgba(138,138,138,0.7)',
		color: '#000',
		sizeW: '',
		sizeH: '',
		source: '',
	});

}

	   



});