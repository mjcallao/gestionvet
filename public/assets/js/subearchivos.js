$(document).on('ready', function() 
{	
	$('.cantidad').autoNumeric('init',{
		aSep	: '', 		
		vMax	: '999999999',
		vMin	: '0',
		mDec	: '0'
	});
	
	Dropzone.autoDiscover=false;
	var mi = $('#dropzone').dropzone({
		autoProcessQueue 	: false,
		uploadMultiple		: true,
		maxFile 			: 100,
		url					: '/files/store',
		maxFilesize 		: 20,
		//dictFileTooBig		: "La imágen que intenta subir pesa más 1.024 kb.",
		addRemoveLinks		: true,
		//dictCancelUpload	: 'Eliminar Imagen',
		dictRemoveFile		: 'Eliminar Imagen',
		//maxFilesize			: 1,
		dictResponseError	: 'Ha ocurrido un error y el archivo no ha sido enviado al servidor.',
		uploadMultiple		: true,
    	parallelUploads		: 100,
    	dictMaxFilesExceeded: "Sólo se permiten subir 20 imágenes a la vez.",
    	createImageThumbnails : true,
    	dictDefaultMessage	: '',
		init: function(){
			var myDropzone = this;				    	   
        	myDropzone.on("sending", function (file, xhr, formData){      

            	$('#formulario-propiedad-imagenes').validate({
					      	onfocusout: false,//deshabilito la validación cuando pierde el foco
					      	onkeyup: false,//deshabilito la validación mientras se ingresan los datos
					      	rules:
					      	{
					      		'codigo':
					      		{
					      			required:true,
					      		},
					      		'titulo':
					      		{
					      			required:true,
					      		},
					      		'propiedad-tipo':
					      		{
					      			required:true,
					      		},					      		
					      		'pais':
					      		{
					      			required:true,
					      		},
					      		'provincia':
					      		{
					      			required:true,
					      		},
					      		'partido':
					      		{
					      			required:true,
					      		},
					      		'localidad':
					      		{
					      			required:true,
					      		},
					      		'calle':
					      		{
					      			required:true,
					      		},
					      		'operacion':
					      		{
					      			required:true,
					      		}
					      	},
					      	messages:
					      	{
					      		'codigo':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Código en obligatorio');
					      				$('#codigo').focus();					      				
					      			}
					      		},
					      		'titulo':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Título en obligatorio');
					      				$('#titulo').focus();
					      			}
					      		},
					      		'propiedad-tipo':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Tipo de Propiedad en obligatorio');
					      				$('#propiedad-tipo').focus();
					      			}
					      		},					      		
					      		'pais':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo País en obligatorio');
					      				$('#pais').focus();
					      			}
					      		},
					      		'provincia':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Provincia en obligatorio');
					      				$('#provincia').focus();
					      			}
					      		},
					      		'partido':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Partido en obligatorio');
					      				$('#partido').focus();
					      			}
					      		},
					      		'localidad':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Localidad en obligatorio');
					      				$('#localidad').focus();
					      			}
					      		},
					      		'calle':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Calle en obligatorio');
					      				$('#calle').focus();
					      			}
					      		},
					      		'operacion':
					      		{
					      			required: function (argument) {					      				
					      				alert('El campo Operación en obligatorio');
					      				$('#operacion').focus();
					      			}
					      		}
					      	}
				});
						var valid = $('#formulario-propiedad-imagenes').valid();

						if (valid==false) {
							event.stopPropagation();
							return false;
						};

				formData.append("codigo", $('#codigo').val());
				formData.append("titulo", $('#titulo').val());
				formData.append("propiedad-tipo", $('#propiedad-tipo').val());
				formData.append("pais", $('#pais').val());
				formData.append("provincia", $('#provincia').val());
				formData.append("partido", $('#partido').val());
				formData.append("localidad", $('#localidad').val());
				formData.append("calle", $('#calle').val());
				formData.append("operacion", $('#operacion').val());
				formData.append("numero", $('#numero').val());
				formData.append("plantas", $('#plantas').val());
				formData.append("metros-cubiertos", $('#metros-cubiertos').val());
				formData.append("metros-totales", $('#metros-totales').val());
				formData.append("metros-semi-cubiertos", $('#metros-semi-cubiertos').val());
				formData.append("ambientes", $('#ambientes').val());
				formData.append("banios", $('#banios').val());
				formData.append("piscina", $('input[name=piscina]:checked').val());
				formData.append("solarium", $('input[name=solarium]:checked').val());
				formData.append("gym", $('input[name=gym]:checked').val());
				formData.append("sum", $('input[name=sum]:checked').val());
				formData.append("tenis", $('input[name=tenis]:checked').val());
				formData.append("futbol", $('input[name=futbol]:checked').val());
				formData.append("golf", $('input[name=golf]:checked').val());
				formData.append("seguridad", $('input[name=seguridad]:checked').val());
				formData.append("balcon", $('input[name=balcon]:checked').val());
				formData.append("garage", $('input[name=garage]:checked').val());
				formData.append("aa", $('input[name=aa]:checked').val());
				formData.append("lavavajillas", $('input[name=lavavajillas]:checked').val());
				formData.append("moneda", $('#moneda').val());
				formData.append("precio", $('#precio').val());
				formData.append("prioridad", $('#prioridad').val());
				formData.append("descripcion", $('#descripcion').val());


        	});
        	myDropzone.on('error', function (file) {
        		//alert('Ha sucedido un error en la subida de las imágenes vuelva a intentarlo.')
        	});
        	$("#btn-sube-propiedad").click(function (e){
		       e.preventDefault();
		       e.stopPropagation();
		       myDropzone.processQueue();

		 
		    });
		    myDropzone.on("complete", function (file){
		      myDropzone.removeAllFiles( true );				
		      
		    });
		   
        	myDropzone.on("success", function (file, data){
        		if (data.success==false) {
        			alert(data.msj);
        			switch (err=data.numerror) {
        					case 1:
        						$('#codigo').focus();
        						$('#codigo').select();
        						break;
        					case 2:
        						$('#propiedad-tipo').focus();
        						$('#propiedad-tipo').select();
        						break;
        					case 3:
        						$('#operacion').focus();
        						$('#operacion').select();
        						break;
        					case 4:
        						$('#pais').focus();
        						$('#pais').select();
        						break;
        					case 5:
        						$('#provincia').focus();
        						$('#provincia').select();
        						break;
        					case 6:
        						$('#partido').focus();
        						$('#partido').select();
        						break;
        					case 7:
        						$('#localidad').focus();
        						$('#localidad').select();
        						break;
        					case 8:
        						$('#moneda').focus();
        						$('#moneda').select();
        						break;
        					
        				}	
        		}else{
        				        
        			$(':text').val('');
		        	$('#descripcion').val('');
        			alert(data.msj);
        			
        		}
        		
		       
		    });
        	myDropzone.on("addedfile", function (file){

		       
		    });
    	}

	});//cierra dropzone

	// $('#btn-sube-propiedad').on('click', function(event){
	// 	$('#formulario-propiedad-datos').submit();
	// 	$('#formulario-propiedad-imagenes').submit();
	// });




});