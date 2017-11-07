$(document).on('ready', function() 
{
	// $('[data-remodal-id=modal-login]').on('opening', function(){
	//   alert('Modal is opening');
	// });
	$('[data-remodal-id=modal-login]').on('opened', function(){
	  	$('#login-user').select();
	});
	

	
	
	$('#login-formulario').on('submit', function(event){
		$('#login-formulario').validate({
	      	onfocusout: false,//deshabilito la validación cuando pierde el foco
	      	onkeyup: false,//deshabilito la validación mientras se ingresan los datos
	      	rules:
	      	{
	      		'login-user':
	      		{
	      			required:true
	      		},
	      		'login-pass':
	      		{
	      			required:true
	      		}
	      	},
	      	messages:
	      	{
	      		'login-user':
	      		{
	      			required:"El campo Usuario es obligatorio",	
	      		},
	      		'login-pass':
	      		{
	      			required:"El campo Contraseña es obligatorio",	
	      		}
	      	}
		});
		var valid = $('#login-formulario').valid();

		if (valid==false) {
			event.stopPropagation();
			return false;
		};

		var datosLoguin = {
				'username' : $('#login-user').val(),
				'password' : $('#login-pass').val()
		}

		$.ajax({
			url: '/postLogin',
			type: 'POST',
			dataType: 'json',
			data: {'datosLoguin': JSON.stringify(datosLoguin)},
			success: function(argument){
				if (argument.success==true){
					window.location.href = '/panel-principal';
					var mimodal = $('[data-remodal-id=modal-login]').remodal();
					mimodal.close();
				}else{
					alert(argument.msj);
				}
			}
		});//cierra ajax
		return false;	
	});
	
	
	$('#mi-ul').on('click', '#logout', function(){
		$.ajax({
			url: '/logout',
			type: 'POST',
			success: function(argument){
				$("#mi-li").empty();
				$('#nuevo-li').empty();
				$("#mi-li").append('<a data-remodal-target="modal-login" class="main-menu">Iniciar Sesión</a>');
			}			
		});
		
		
	});//cierra on(click)
});