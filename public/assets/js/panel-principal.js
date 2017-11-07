$(document).on('ready', function()
{
	//$('.coto').chosen();
	$.ajax({
		url: '/tipopropiedades',
		success: function(data){
			var tipo=[];
			$.each(data.tipopropiedades, function(i, item){
				 tipo.push(item.tipopropiedad);
			});
			$('#propiedad-tipo').autocomplete({
				source:tipo,
				close: function(){
					$('#pais').focus();
					$('#pais').select();
				},
			});	
		},
		
	});

	
	$.ajax({
		url: '/paises',
		success: function(data){
			var paises=[];
			$.each(data.paises, function(i, item){
				 paises.push(item.pais);
			});
			$('#pais').autocomplete({
				source:paises,
				change: function(data){
					$.ajax({
						url : '/provincias',
						data: {'pais' : $('#pais').val()},
						success: function(data){
							var provincias=[];
							$.each(data.provincias, function(i, item){
								 provincias.push(item.provincia);
							});//cierra each
							$('#provincia').autocomplete({
								source:provincias,
								change: function(data){
									$.ajax({
										url: '/partidos',										
										data: {'provincia' : $('#provincia').val()},
										success:function(data){
											if (data.success==false) {
												alert(data.msj)
												return false;
												$('#provincia').focus();
												$('#provincia').select();
											};
											var partidos=[];
											$.each(data.partidos, function(i, item){
												 partidos.push(item.partido);
											});//cierra each
											$('#partido').autocomplete({
												source:partidos,
												change: function(data){
													$.ajax({
														url: '/localidades',
														data: {'partido': $('#partido').val()},
														success: function(data){
															if (data.success==false) {
																alert(data.msj)
																return false;
																$('#partido').focus();
																$('#partido').select();
															};
															var localidades=[];
															$.each(data.localidades, function(i, item){
																 localidades.push(item.localidad);
															});//cierra each
															$('#localidad').autocomplete({
																source:localidades,
																close: function(){
																	$('#calle').focus();
																	$('#calle').select();
																},
															})

														},
													});	
												},//cierra change
												close: function(){
													$('#localidad').focus();
													$('#localidad').select();
												},

											});
										}
									});//cierra ajax

								},//cierra change
								close: function(){
									$('#partido').focus();
									$('#partido').select();
								},
							});
						},//cierra success
					});//cierra ajax										
				},//cierra change
				close: function(){
					$('#provincia').focus();
					$('#provincia').select();
				}
			});//cierra #pais	
		}
	});//cierra ajax pais

	$.ajax({
		url: '/operaciones',
		success: function(data){
			var operaciones=[];
			$.each(data.operaciones, function(i, item){
				 operaciones.push(item.operacion);
			});
			$('#operacion').autocomplete({
				source:operaciones,
				close: function(){
					$('#metros-cubiertos').focus();
					$('#metros-cubiertos').select();
				},
			});	
		},
		
	});

	$.ajax({
		url: '/monedas',
		success: function(data){
			var monedas=[];
			$.each(data.monedas, function(i, item){
				 monedas.push(item.moneda);
			});
			$('#moneda').autocomplete({
				source:monedas,
				close: function(){
					$('#precio').focus();
					$('#precio').select();
				},
			});	
		},
	});
	
	
	
	//--->>> BOTON AGREGAR PAIS <<<---///
	$('#agregar-pais').on('click', function(event) {
		event.preventDefault();
		$.ajax({
			url: '/paises/create',
			success : function(data){
				$('#botones').empty();
	            $('#panel').empty();
	            $('#panel').html(data);
			}			
		});
	});

	//--->>> BOTON AGREGAR PAIS <<<---///
	$('#agregar-provincia').on('click', function(event) {
		event.preventDefault();
		$.ajax({
			url: '/provincias/create',
			success : function(data){
				$('#botones').empty();
	            $('#panel').empty();
	            $('#panel').html(data);
			}			
		});
	});

	//--->>> BOTON AGREGAR PARTIDO <<<---///
	$('#agregar-partido').on('click', function(event) {
		event.preventDefault();
		$.ajax({
			url: '/partidos/create',
			success : function(data){
				$('#botones').empty();
	            $('#panel').empty();
	            $('#panel').html(data);
			}			
		});
	});
	
	//--->>> BOTON AGREGAR LOCALIDAD <<<---///
	$('#agregar-localidad').on('click', function(event) {
		event.preventDefault();
		$.ajax({
			url: '/localidades/create',
			success : function(data){
				$('#botones').empty();
	            $('#panel').empty();
	            $('#panel').html(data);
			}			
		});
	});

});