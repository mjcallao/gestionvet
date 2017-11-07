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





});