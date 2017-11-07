@extends('layout')

    <!-- Body principal -->

@section('content')
	<div class="container">
		<div class="panel panel-default mi-panel">
			<div class="panel-heading">
				<p class="mi-titulo">Panel de Control</p>
			</div>
			<div class="panel-body">
				<div class="row">
					 <div class="col-md-2" id="panel-izquierdo">	   
					 <br>   
				      <ul class="nav nav-pills nav-stacked">
				        <li id="grupos"><a href="/panel-principal"><i class="fa fa-cogs" aria-hidden="true"></i><span>{{'  Agregar propiedad'}}</span></a></li>
				        <li id="listado-propiedades"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span>{{'  Listado Propiedades'}}</span></a></li>
				        <li id="agregar-pais"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{' Agregar País'}}</span></a></li>
				        <li id="agregar-provincia"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{' Agregar Provincia'}}</span></a></li>
				        <li id="agregar-partido"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{' Agregar Partido'}}</span></a></li>
				        <li id="agregar-localidad"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{' Agregar Localidad'}}</span></a></li>
				      </ul>
				      
				      <hr>
				      
				  	</div><!-- CIERRA COLUMN 2-->
				  	<div class="col-md-10" id="panel">
				  		<br>
						<p class="mi-subtitulo text-center">Características</p>
<form id="formulario-propiedad-imagenes"  role="form"  enctype="multipart/form-data" method="post">
				  		<div class="row">			 	 	
							<div class="col-md-2">
								<div class="form-group">
								  <p>Código <input id="codigo" name="codigo" class="form-control input-sm" type="text" autocomplete="off" autofocus></p>				 
								</div>
						  	</div>
						  	<div class="col-md-7">
								<div class="form-group">
								  <p>Título <input id="titulo" name="titulo" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-3">
								<div class="form-group">
								  <p>Tipo de propiedad <input id="propiedad-tipo" name="propiedad-tipo" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
					    </div><!-- CIERRA ROW-->
						<div class="row">			 	 	
							<div class="col-md-3">
								<div class="form-group">
								  <p>País <input id="pais" name="pais" class="form-control input-sm" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-3">
								<div class="form-group">
								  <p>Provincia <input id="provincia" name="provincia" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-3">
								<div class="form-group">
								  <p>Partido <input id="partido" name="partido" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-3">
								<div class="form-group">
								  <p>Localidad <input id="localidad" name="localidad" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
					    </div><!-- CIERRA ROW-->
					    <div class="row">			 	 	
							<div class="col-md-4">
								<div class="form-group">
								  <p>Calle <input id="calle" name="calle" class="form-control input-sm" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-2">
								<div class="form-group">
								  <p>Número <input id="numero" name="numero" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-2">
								<div class="form-group">
								  <p>Operación <input id="operacion" name="operacion" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-2">
								<div class="form-group">
								  <p>Mts. cubiertos <input id="metros-cubiertos" name="metros-cubiertos" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-2">
								<div class="form-group">
								  <p>Mts. Semi cubiertos <input id="metros-semi-cubiertos" name="metros-semi-cubiertos" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
					    </div><!-- CIERRA ROW-->
					    <div class="row">
					    	<div class="col-md-2">
								<div class="form-group">
								  <p>Superficie<input id="metros-totales" name="metros-totales" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-1">
								<div class="form-group">
								  <p>Plantas <input id="plantas" name="plantas" class="form-control input-sm text-center cantidad" type="text" autocomplete="off" value="1"></p>				 
								</div>
						  	</div>
					    	<div class="col-md-1">
								<div class="form-group">
								  <p>Ambientes <input id="ambientes" name="ambientes" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-1">
								<div class="form-group">
								  <p>Baños <input id="banios" name="banios" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	
					    </div><!-- CIERRA ROW-->
					    <p class="mi-subtitulo text-center">Ameneties</p>
					    <div class="row">					    	
					    	<div class="col-md-2">
						  		<p class="col-md-offset-1">Piscina</p>
								<label class="btn-default">
								<input type="radio" name="piscina" value="1" id="piscina_si" > SI
								</label>
								<label class="">
								<input type="radio" name="piscina" value="0" id="piscina_no" checked="checked"> NO
								</label>
							</div>	
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Solarium</p>
								<label class="btn-default">
								<input type="radio" name="solarium" value="1" id="solarium_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="solarium" value="0" id="solarium_no" checked="checked"> NO
								</label>
							</div>	
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Gymnasio</p>
								<label class="btn-default">
								<input type="radio" name="gym" value="1" id="gym_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="gym" value="0" id="gym_no" checked="checked"> NO
								</label>
							</div>	
							<div class="col-md-2">
						  		<p class="col-md-offset-1">SUM</p>
								<label class="btn-default">
								<input type="radio" name="sum" value="1" id="sum_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="sum" value="0" id="sum_no" checked="checked"> NO
								</label>
							</div>	
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Tenis</p>
								<label class="btn-default">
								<input type="radio" name="tenis" value="1" id="tenis_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="tenis" value="0" id="tenis_no" checked="checked"> NO
								</label>
							</div>	
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Fútbol</p>
								<label class="btn-default">
								<input type="radio" name="futbol" value="1" id="futbol_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="futbol" value="0" id="futbol_no" checked="checked"> NO
								</label>
							</div>	
					    </div><!-- CIERRA ROW-->
					    <div class="row">
					    	<div class="col-md-2">
						  		<p class="col-md-offset-1">Golf</p>
								<label class="btn-default">
								<input type="radio" name="golf" value="1" id="golf_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="golf" value="0" id="golf_no" checked="checked"> NO
								</label>
							</div>
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Seguridad</p>
								<label class="btn-default">
								<input type="radio" name="seguridad" value="1" id="seguridad_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="seguridad" value="0" id="seguridad_no" checked="checked"> NO
								</label>
							</div>
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Balcón</p>
								<label class="btn-default">
								<input type="radio" name="balcon" value="1" id="balcon_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="balcon" value="0" id="balcon_no" checked="checked"> NO
								</label>
							</div>
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Garage</p>
								<label class="btn-default">
								<input type="radio" name="garage" value="1" id="garage_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="garage" value="0" id="garage_no" checked="checked"> NO
								</label>
							</div>
							<div class="col-md-2">
						  		<p >A. Acondicionado</p>
								<label class="btn-default">
								<input type="radio" name="aa" value="1" id="aa_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="aa" value="0" id="aa_no" checked="checked"> NO
								</label>
							</div>
							<div class="col-md-2">
						  		<p class="col-md-offset-1">Lavavajillas</p>
								<label class="btn-default">
								<input type="radio" name="lavavajillas" value="1" id="lavavajillas_si" > SI
								</label>
								<label class="btn-default">
								<input type="radio" name="lavavajillas" value="0" id="lavavajillas_no" checked="checked"> NO
								</label>
							</div>
					    </div><!-- CIERRA ROW-->
					    <br>
					    <p class="mi-subtitulo text-center">Información monetaria</p>
					    <div class="row">
					    	<div class="col-md-3">
								<div class="form-group">
								  <p>Moneda <input id="moneda" name="moneda" class="form-control input-sm text-center" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  	<div class="col-md-3">
								<div class="form-group">
								  <p>Precio <input id="precio" name="precio" class="form-control input-sm text-center cantidad" type="text" autocomplete="off"></p>				 
								</div>
						  	</div>
						  
						  	<div class="col-md-3 col-md-offset-3">
						  		<div class="form-group">
								  <label >Prioridad</label>
								  <select class="form-control coto" id="prioridad" name="prioridad" >
								    <option value="10">10</option>
								    <option value="9">9</option>
								    <option value="8">8</option>
								    <option value="7">7</option>
								    <option value="6">6</option>
								    <option value="5">5</option>
								    <option value="4">4</option>
								    <option value="3">3</option>
								    <option value="2">2</option>
								    <option value="1">1</option>								    
								  </select>
								</div>
						  	</div>
					    </div><!-- CIERRA ROW-->

					    <p class="mi-subtitulo text-center">Cargar imágenes</p>

							        <div class="row">
							        	<div class="col-md-offset-1 col-md-10">
							        		<div class="text-center dz-message dropzone" id="dropzone">
							        			Click aquí para cargar las imágenes
							                 
							                  
							              </div>
							        	</div>    
							               
							           
							            <br>
							            <br>
							        </div><!-- CIERRA ROW-->
							          <br>
						<br>
					    <p class="mi-subtitulo text-center">Descripción</p>
					    <div class="row">
					    	<div class="col-md-12">
					    		<textarea id="descripcion" cols="120" rows="5"></textarea>
					    	</div>
						  
						  
					    </div><!-- CIERRA ROW-->
							        
							          
						      
						    		
					<br>
				  	</div>
				</div>
				<div class="row" id="botones">
					<div class="col-md-offset-2 col-md-10 text-center">
						<button class="remodal-cancel">Cancel</button>
		          		<button type="button" id="btn-sube-propiedad" class="btn btn-default remodal-confirm">Ingresar</button>
					</div>
		        	
		        </div>
	</form>
			</div>
			<div class="panel-footer">
				Zulma Barrios - Propiedades
			</div>
		</div>
	</div>
	
@stop
@section('script')
	{{HTML::script("//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js")}}
    {{HTML::script("assets/js/panel-principal.js")}}
    {{HTML::script("assets/js/listado-propiedades.js")}}
    {{HTML::script("assets/js/pais.js")}}
@stop