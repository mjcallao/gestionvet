<br>
<p class="mi-subtitulo text-center">Agregar fotos a una propiedad</p>
<div class="container" style="height: 350px">
	<form id="formulario-agrega-fotos"  enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<div class="row">
			<div class="col-md-1 text-right">
				<p>Propiedad:</p>
			</div>
			<div class="col-md-1 text-left" id="codigo">				
				@if($codigo)
					{{$codigo}}
				@endif
			</div>

		</div>
		<br>
		 <div class="row">
	        	<div class="col-md-offset-1 col-md-8">
	        		<div class="text-center dz-message dropzone" id="dropzone">
	        			Click aquí para cargar las imágenes
	                 
	                  
	              </div>
	        	</div>    
	               
	           
	            <br>
	            <br>
        </div><!-- CIERRA ROW-->
		<div class="row">
			<div class="col-md-offset-4 col-md-1">
				<button type="button" id="btn-agrega-fotos" class="btn btn-default remodal-confirm">Subir</button>
			</div>
	    </div>
    </form>
</div>
<script>
	Dropzone.autoDiscover=false;
	var mi = $('#dropzone').dropzone({
		autoProcessQueue 	: false,
		uploadMultiple		: true,
		maxFile 			: 100,
		url					: '/files/agregafoto',
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
        		formData.append("codigo", $('#codigo').text().trim());

        	});	
        	$("#btn-agrega-fotos").click(function (e){
		       e.preventDefault();
		       e.stopPropagation();
		       myDropzone.processQueue();
		 
		    });
		    myDropzone.on("complete", function (file){
		        // console.log('El archivo subió correctamente. ' + file.name);
		        myDropzone.removeAllFiles( true );	        
		        alert('Agregado de imágenes exitoso.')
		    });
        },
    });		
</script>

    
