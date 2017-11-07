<br>
						<p class="mi-subtitulo text-center">Editar Propiedad</p>
<form id="formulario-edita-propiedad"  role="form"  method="POST">
				  		<div class="row">			 	 	
							@if($propiedad)
								<div class="col-md-2">
									<div class="form-group">
									  <p>Código <input id="edita-codigo" name="edita-codigo" class="form-control input-sm" type="text" autocomplete="off" value='{{$propiedad[0]->codigo}}' disabled></p>				 
									</div>
							  	</div>
							  	<div class="col-md-7">
									<div class="form-group">
									  <p>Título <input id="edita-titulo" name="edita-titulo" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->titulo}}' autofocus></p>				 
									</div>
							  	</div>
							  	<div class="col-md-3">
									<div class="form-group">
									  <p>Tipo de propiedad <input id="edita-propiedad-tipo" name="edita-propiedad-tipo" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->tipopropiedad}}'></p>				 
									</div>
							  	</div>
						    </div><!-- CIERRA ROW-->
							<div class="row">			 	 	
								<div class="col-md-3">
									<div class="form-group">
									  <p>País <input id="edita-pais" name="edita-pais" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->pais}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-3">
									<div class="form-group">
									  <p>Provincia <input id="edita-provincia" name="edita-provincia" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->provincia}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-3">
									<div class="form-group">
									  <p>Partido <input id="edita-partido" name="edita-partido" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->partido}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-3">
									<div class="form-group">
									  <p>Localidad <input id="edita-localidad" name="edita-localidad" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->localidad}}'></p>				 
									</div>
							  	</div>
						    </div><!-- CIERRA ROW-->
						    <div class="row">			 	 	
								<div class="col-md-4">
									<div class="form-group">
									  <p>Calle <input id="edita-calle" name="edita-calle" class="form-control input-sm" type="text" autocomplete="off" value='{{$propiedad[0]->calle}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-2">
									<div class="form-group">
									  <p>Número <input id="edita-numero" name="edita-numero" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->numero}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-2">
									<div class="form-group">
									  <p>Operación <input id="edita-operacion" name="edita-operacion" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->operacion}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-2">
									<div class="form-group">
									  <p>Mts. cubiertos <input id="edita-metros-cubiertos" name="edita-metros-cubiertos" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->mtscubiertos}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-2">
									<div class="form-group">
									  <p>Mts. Semi cubiertos <input id="edita-metros-semi-cubiertos" name="edita-metros-semi-cubiertos" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->mtssemicubiertos}}'></p>				 
									</div>
							  	</div>
						    </div><!-- CIERRA ROW-->
						    <div class="row">
						    	<div class="col-md-2">
									<div class="form-group">
									  <p>Superficie<input id="edita-metros-totales" name="edita-metros-totales" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->mtstotal}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-1">
									<div class="form-group">
									  <p>Plantas <input id="edita-plantas" name="edita-plantas" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->plantas}}'></p>				 
									</div>
							  	</div>
						    	<div class="col-md-1">
									<div class="form-group">
									  <p>Ambientes <input id="edita-ambientes" name="edita-ambientes" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->habitaciones}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-1">
									<div class="form-group">
									  <p>Baños <input id="edita-banios" name="edita-banios" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->banios}}'></p>				 
									</div>
							  	</div>
							  	
						    </div><!-- CIERRA ROW-->
						    <p class="mi-subtitulo text-center">Ameneties</p>
						    <div class="row">					    	
						    	<div class="col-md-2">
						    		@if($propiedad[0]->piscina==1)
								  		<p class="col-md-offset-1">Piscina</p>
										<label class="btn-default">
										<input type="radio" name="edita-piscina" value="1" id="edita-piscina_si" checked="checked"> SI
										</label>
										<label class="">
										<input type="radio" name="edita-piscina" value="0" id="edita-piscina_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Piscina</p>
										<label class="btn-default">
										<input type="radio" name="edita-piscina" value="1" id="edita-piscina_si" > SI
										</label>
										<label class="">
										<input type="radio" name="edita-piscina" value="0" id="edita-piscina_no" checked="checked"> NO
										</label>
									@endif
								</div>	
								<div class="col-md-2">
									@if($propiedad[0]->solarium==1)
								  		<p class="col-md-offset-1">Solarium</p>
										<label class="btn-default">
										<input type="radio" name="edita-solarium" value="1" id="edita-solarium_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-solarium" value="0" id="edita-solarium_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Solarium</p>
										<label class="btn-default">
										<input type="radio" name="edita-solarium" value="1" id="edita-solarium_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-solarium" value="0" id="edita-solarium_no" checked="checked"> NO
										</label>
									@endif							  		
								</div>	
								<div class="col-md-2">
									@if($propiedad[0]->gimnasio==1)
								  		<p class="col-md-offset-1">Gymnasio</p>
										<label class="btn-default">
										<input type="radio" name="edita-gym" value="1" id="edita-gym_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-gym" value="0" id="edita-gym_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Gymnasio</p>
										<label class="btn-default">
										<input type="radio" name="edita-gym" value="1" id="edita-gym_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-gym" value="0" id="edita-gym_no" checked="checked"> NO
										</label>
									@endif
							  		
								</div>	
								<div class="col-md-2">
									@if($propiedad[0]->sum==1)
								  		<p class="col-md-offset-1">SUM</p>
										<label class="btn-default">
										<input type="radio" name="edita-sum" value="1" id="edita-sum_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-sum" value="0" id="edita-sum_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">SUM</p>
										<label class="btn-default">
										<input type="radio" name="edita-sum" value="1" id="edita-sum_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-sum" value="0" id="edita-sum_no" checked="checked"> NO
										</label>
									@endif							  		
								</div>	
								<div class="col-md-2">
									@if($propiedad[0]->tenis==1)
								  		<p class="col-md-offset-1">Tenis</p>
										<label class="btn-default">
										<input type="radio" name="edita-tenis" value="1" id="edita-tenis_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-tenis" value="0" id="edita-tenis_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Tenis</p>
										<label class="btn-default">
										<input type="radio" name="edita-tenis" value="1" id="edita-tenis_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-tenis" value="0" id="edita-tenis_no" checked="checked"> NO
										</label>
									@endif	
							  		
								</div>	
								<div class="col-md-2">
									@if($propiedad[0]->futbol==1)
								  		<p class="col-md-offset-1">Fútbol</p>
										<label class="btn-default">
										<input type="radio" name="edita-futbol" value="1" id="edita-futbol_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-futbol" value="0" id="edita-futbol_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Fútbol</p>
										<label class="btn-default">
										<input type="radio" name="edita-futbol" value="1" id="edita-futbol_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-futbol" value="0" id="edita-futbol_no" checked="checked"> NO
										</label>
									@endif	
							  		
								</div>	
						    </div><!-- CIERRA ROW-->
						    <div class="row">
						    	<div class="col-md-2">
						    		@if($propiedad[0]->golf==1)
								  		<p class="col-md-offset-1">Golf</p>
										<label class="btn-default">
										<input type="radio" name="edita-golf" value="1" id="edita-golf_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-golf" value="0" id="edita-golf_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Golf</p>
										<label class="btn-default">
										<input type="radio" name="edita-golf" value="1" id="edita-golf_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-golf" value="0" id="edita-golf_no" checked="checked"> NO
										</label>
									@endif	
							  		
								</div>
								<div class="col-md-2">
									@if($propiedad[0]->seguridad==1)
								  		<p class="col-md-offset-1">Seguridad</p>
										<label class="btn-default">
										<input type="radio" name="edita-seguridad" value="1" id="edita-seguridad_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-seguridad" value="0" id="edita-seguridad_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Seguridad</p>
										<label class="btn-default">
										<input type="radio" name="edita-seguridad" value="1" id="edita-seguridad_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-seguridad" value="0" id="edita-seguridad_no" checked="checked"> NO
										</label>
									@endif	
							  		
								</div>
								<div class="col-md-2">
									@if($propiedad[0]->balcon==1)
								  		<p class="col-md-offset-1">Balcón</p>
										<label class="btn-default">
										<input type="radio" name="edita-balcon" value="1" id="edita-balcon_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-balcon" value="0" id="edita-balcon_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Balcón</p>
										<label class="btn-default">
										<input type="radio" name="edita-balcon" value="1" id="edita-balcon_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-balcon" value="0" id="edita-balcon_no" checked="checked"> NO
										</label>
									@endif
							  		
								</div>
								<div class="col-md-2">
									@if($propiedad[0]->garage==1)
								  		<p class="col-md-offset-1">Garage</p>
										<label class="btn-default">
										<input type="radio" name="edita-garage" value="1" id="edita-garage_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-garage" value="0" id="edita-garage_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Garage</p>
										<label class="btn-default">
										<input type="radio" name="edita-garage" value="1" id="edita-garage_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-garage" value="0" id="edita-garage_no" checked="checked"> NO
										</label>
									@endif
							  		
								</div>
								<div class="col-md-2">
									@if($propiedad[0]->aa==1)
								  		<p >A. Acondicionado</p>
										<label class="btn-default">
										<input type="radio" name="edita-aa" value="1" id="edita-aa_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-aa" value="0" id="edita-aa_no" > NO
										</label>
									@else
										<p >A. Acondicionado</p>
										<label class="btn-default">
										<input type="radio" name="edita-aa" value="1" id="edita-aa_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-aa" value="0" id="edita-aa_no" checked="checked"> NO
										</label>
									@endif
							  		
								</div>
								<div class="col-md-2">
									@if($propiedad[0]->lavavajillas==1)
								  		<p class="col-md-offset-1">Lavavajillas</p>
										<label class="btn-default">
										<input type="radio" name="edita-lavavajillas" value="1" id="edita-lavavajillas_si" checked="checked"> SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-lavavajillas" value="0" id="edita-lavavajillas_no" > NO
										</label>
									@else
										<p class="col-md-offset-1">Lavavajillas</p>
										<label class="btn-default">
										<input type="radio" name="edita-lavavajillas" value="1" id="edita-lavavajillas_si" > SI
										</label>
										<label class="btn-default">
										<input type="radio" name="edita-lavavajillas" value="0" id="edita-lavavajillas_no" checked="checked"> NO
										</label>
									@endif
							  		
								</div>
						    </div><!-- CIERRA ROW-->
						    <br>
						    <p class="mi-subtitulo text-center">Información monetaria</p>
						    <div class="row">
						    	<div class="col-md-3">
									<div class="form-group">
									  <p>Moneda <input id="edita-moneda" name="edita-moneda" class="form-control input-sm text-center" type="text" autocomplete="off" value='{{$propiedad[0]->moneda}}'></p>				 
									</div>
							  	</div>
							  	<div class="col-md-3">
									<div class="form-group">
									  <p>Precio <input id="edita-precio" name="edita-precio" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value='{{$propiedad[0]->valor}}'></p>				 
									</div>
							  	</div>
							  
							  	<div class="col-md-3 col-md-offset-3">
							  		<div class="form-group">
									  <label >Prioridad</label>
									  <select class="form-control coto" id="edita-prioridad" name="edita-prioridad">
									  	@if($propiedad[0]->prioridad==10)
									    	<option value="10" selected>10</option>
										@else
											<option value="10">10</option>
										@endif
										@if($propiedad[0]->prioridad==9)
									    	<option value="9" selected>9</option>
										@else
											<option value="9">9</option>
										@endif
									    @if($propiedad[0]->prioridad==8)
									    	<option value="8" selected>8</option>
										@else
											<option value="8">8</option>
										@endif
										@if($propiedad[0]->prioridad==7)
									    	<option value="7" selected>7</option>
										@else
											<option value="7">7</option>
										@endif
										@if($propiedad[0]->prioridad==6)
									    	<option value="6" selected>6</option>
										@else
											<option value="6">6</option>
										@endif
										@if($propiedad[0]->prioridad==5)
									    	<option value="5" selected>5</option>
										@else
											<option value="5">5</option>
										@endif
										@if($propiedad[0]->prioridad==4)
									    	<option value="4" selected>4</option>
										@else
											<option value="4">4</option>
										@endif
										@if($propiedad[0]->prioridad==3)
									    	<option value="3" selected>3</option>
										@else
											<option value="3">3</option>
										@endif
										@if($propiedad[0]->prioridad==2)
									    	<option value="2" selected>2</option>
										@else
											<option value="2">2</option>
										@endif
										@if($propiedad[0]->prioridad==1)
									    	<option value="1" selected>1</option>
										@else
											<option value="1">1</option>
										@endif						    
									  </select>
									</div>
							  	</div>
						    </div><!-- CIERRA ROW-->
						@endif
						@if($imagenes)
							<p class="mi-subtitulo text-center">Imágenes</p>
								<div class="row">	
									@foreach($imagenes as $imagen)											
										<div class="sunhouse-item col-md-3 text-center">
											<p class="text-danger">{{$imagen->nombre}}</p>
					                        <img src={{'/uploads/'.$imagen->codigo_id.'/Thumbnail/'.$imagen->nombre.'.JPG'}} alt="" class="img-responsive layout-1"/>
					                        <div class="col-md-12">
					                        	<div class="col-md-6">
					                        		<p class="text-info">Emilinar</p>
													<label class="btn-default">
														<input type="radio" name={{'elimina-imagen-'.$imagen->nombre}} id={{$imagen->nombre}} value="1" > SI
													</label>
													<label class="btn-default">
														<input type="radio" name={{'elimina-imagen-'.$imagen->nombre}} id={{$imagen->nombre}} value="0" checked="checked"> NO
													</label>
					                        	</div>
					                        	<div class="col-md-6">
					                        		<p class="text-info">Portada</p>
													<label class="btn-default">
														<input type="radio" name={{'portada-'.$imagen->nombre}} id={{$imagen->nombre}} value="1" > SI
													</label>
													<label class="btn-default">
														<input type="radio" name={{'portada-'.$imagen->nombre}} id={{$imagen->nombre}} value="0" checked="checked"> NO
													</label>
					                        	</div>
					                        </div>
					                        
											
						                </div>
									@endforeach
								</div>
						@endif       
						<br>
					    <p class="mi-subtitulo text-center">Descripción</p>
					    <div class="row">
					    	<div class="col-md-12">
					    		<textarea id="edita-descripcion" cols="120" rows="5">{{$propiedad[0]->descripcion}}</textarea>
					    	</div>
						  
						  
					    </div><!-- CIERRA ROW-->
					    <br>
						<div class="row" id="botones">
							<div class="text-center">				          		
				          		<input type="submit" id="btn-edita-propiedad" class="btn btn-default remodal-confirm" value="Actualizar">
							</div>
				        	
				        </div>
</form>