@extends('layout')

@section('content')
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
               <!--  <div class="section background-opacity page-title property-detail bg-overlay">
                    <div class="container">
                        <div class="page-title-wrapper"><h2 class="captions texto-mi-color">{{$propiedad[0]->titulo}}</h2>
                            <ol class="breadcrumb">
                                <li><h4 class="codigo" style="color: white">{{'codigo: '.$propiedad[0]->codigo}}</h4></li>
                            </ol>
                        </div>
                    </div>
                </div> -->
                <div class="section nav-bar">
                    <div class="nav-bar-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="detail-nav list-unstyled">
                                        <li class="nav-item on-top-btn active">
                                            <figure><i class="icon-house_1 icon"></i>
                                                <figcaption>Arriba</figcaption>
                                            </figure>
                                        </li>
                                        <li class="nav-item condition-btn">
                                            <figure><i class="fa fa-file-text-o icon"></i>
                                                <figcaption>Info.</figcaption>
                                            </figure>
                                        </li>
                                        <li class="nav-item description-btn">
                                            <figure><i class="fa fa-comment-o icon"></i>
                                                <figcaption>Descripción</figcaption>
                                            </figure>
                                        </li>
                                        <li class="nav-item location-btn">
                                            <figure><i class="fa fa-map-marker icon"></i>
                                                <figcaption>Mapa</figcaption>
                                            </figure>
                                        </li>                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section property-detail">
                    <div class="container">
                        <div class="detail-wrapper row">
                            <div class="col-md-8 detail-content">
                                <div class="property-info" id="galeria">
                                    <div class="info">
                                        <div class="model"><i class="fa fa-home"></i><span>{{$propiedad[0]->tipopropiedad}}</span></div>
                                    </div>
                                    <div class="info">
                                        <div class="type"><i class="fa fa-align-justify"></i><span>{{$propiedad[0]->operacion}}</span></div>
                                    </div>
                                    <div class="info">
                                        <div class="price"><i class="fa fa-money"></i><span class="price-num">{{$propiedad[0]->codmoneda .' '. number_format($propiedad[0]->valor,0,',','.')}}</span></div>
                                    </div>
                                    <div class="info">
                                        <div class="acr"><i class="fa fa-arrows-alt"></i><span>{{$propiedad[0]->localidad . ' - '.$propiedad[0]->calle . ' '.$propiedad[0]->numero}}</span></div>
                                    </div>
                                </div>
                                <div class="col-md-12"><p class="title">Galeria <span class="codigo">{{'   Código:  '.$propiedad[0]->codigo}}</span></p> </div>
                                <div class="row gallery" >
                                    <div class="col-md-12 gallery-item" >
                                        <div class="gallery-slider">
                                            @foreach($propiedad as $p)
                                                <div class="slider-item"><img src={{'/uploads/'.$p->codigo.'/'.$p->nombre.'.'.$p->extension}} alt=""/></div>
                                            @endforeach
                                        </div>
                                        <div class="slider-nav">
                                            <div class="slider-nav-wrapper">
                                                @foreach($imagenes as $imagen)
                                                    <div class="slider-nav-item"><img src={{'/uploads/'.$imagen->codigo_id.'/Thumbnail/'.$imagen->nombre.'.'.$imagen->extension}} alt={{$imagen->codigo_id}}/></div>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 title">Información</div>
                                <ul id="condition" class="list-unstyled list-inline condition">
                                    @if($propiedad[0]->habitaciones)
                                        <li class="condition-item">
                                            <div class="info"><i class="icon-bed"></i><span>{{'Habitaciones '.$propiedad[0]->habitaciones}}</span></div>
                                        </li>
                                    @endif
                                     @if($propiedad[0]->banios)
                                        <li class="condition-item">
                                            <div class="info"><i class="icon-bath"></i><span>{{'Baños '.$propiedad[0]->banios}}</span></div>
                                        </li>
                                    @endif
                                    @if($propiedad[0]->garage)
                                        <li class="condition-item">
                                            <div class="info"><i class="icon-house_1"></i><span>{{'Garage '.$propiedad[0]->garage}}</span></div>
                                        </li>
                                    @endif
                                    @if($propiedad[0]->calle)
                                        <li class="condition-item">
                                            <div class="info"><i class="fa fa-arrows-alt"></i><span>{{$propiedad[0]->calle . ' '.$propiedad[0]->numero}}</span></div>
                                        </li>
                                    @endif
                                    @if($propiedad[0]->codmoneda)
                                        <li class="condition-item">
                                            <div class="info"><i class="fa fa-money"></i><span class="price-num">{{$propiedad[0]->codmoneda .' '. number_format($propiedad[0]->valor,0,',','.')}}</span></div>
                                        </li>
                                    @endif
                                    <li class="condition-item">
                                        <div class="info"><i class="fa fa-map-marker icon"></i><span>{{$propiedad[0]->localidad}}</span></div>
                                    </li>
                                    <li class="clearfix"></li>
                                </ul>
                                @if($propiedad[0]->piscina==0 && $propiedad[0]->aa==0 && $propiedad[0]->solarium==0 && $propiedad[0]->gimnasio==0 && $propiedad[0]->sum==0 && $propiedad[0]->tenis==0 && $propiedad[0]->futbol==0 && $propiedad[0]->golf==0 && $propiedad[0]->seguridad==0 && $propiedad[0]->balcon==0 && $propiedad[0]->lavavajillas==0) 
                                @else
                                <div class="col-md-12 title">amenities</div>
                                <ul class="list-unstyled list-inline amenities">
                                    @if($propiedad[0]->piscina==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Piscina</span></li>
                                    @endif
                                    @if($propiedad[0]->aa==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Aire Acondicionado</span></li>
                                    @endif
                                     @if($propiedad[0]->solarium==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Solarium</span></li>
                                    @endif
                                     @if($propiedad[0]->gimnasio==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Ginmasio</span></li>
                                    @endif
                                     @if($propiedad[0]->sum==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>SUM</span></li>
                                    @endif
                                     @if($propiedad[0]->tenis==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Cancha de Tenis</span></li>
                                    @endif
                                     @if($propiedad[0]->futbol==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Cancha de Fútbol</span></li>
                                    @endif
                                     @if($propiedad[0]->golf==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Golf</span></li>
                                    @endif
                                     @if($propiedad[0]->seguridad==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Seguridad Privada</span></li>
                                    @endif
                                     @if($propiedad[0]->balcon==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Balcón</span></li>
                                    @endif
                                     @if($propiedad[0]->lavavajillas==1)
                                        <li class="amenities-item"><i class="fa fa-check-square"></i><span>Lavavajillas</span></li>
                                    @endif
                                </ul>
                                @endif
                                @if($propiedad[0]->descripcion <> "")
                                     <div class="col-md-12 title">Descripción</div>
                                    <div id="description" class="row description">
                                       {{ $propiedad[0]->descripcion }}
                                    </div>
                                @endif
                                <div id="mapa" class="col-md-12 title">Mapa</div>
                            </div>
                            <div class="col-md-4 sidebar margin-top-2">
                                <div class="contact-agent-widget">
                                    <div class="agent-info">
                                        <div class="contact-info">
                                            <div class="info">
                                                <div class="phone"><i class="fa fa-mobile"></i><span>904-621-5632</span></div>
                                            </div>
                                            <div class="info">
                                                <div class="email"><i class="fa fa-envelope-o"></i><span>miles@sunhouse.com</span></div>
                                            </div>
                                            <div class="info">
                                                <div class="skype"><i class="fa fa-skype"></i><span>miles.sunhouse</span></div>
                                            </div>
                                        </div>
                                        <div class="social-info"><a href="#" class="link"><i class="fa fa-facebook"></i></a><a href="#" class="link"><i class="fa fa-twitter"></i></a><a href="#" class="link"><i class="fa fa-google-plus"></i></a><a href="#" class="link"><i class="fa fa-linkedin"></i></a></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="search-widget widget">
                                    <div class="row">
                                                  <div class="col-md-12 ">
                                                    <div class="well well-sm">
                                                      <form  id="mensaje-detalle" method="post">
                                                          <fieldset>
                                                    
                                                            <!-- Name input-->
                                                            <div class="form-group">
                                                              <label class="col-md-3 control-label" for="nombre">Nombre</label>
                                                              <div class="col-md-9">
                                                                <input id="nombre" name="nombre" type="text" placeholder="Apellido y Nombre" class="form-control">
                                                              </div>
                                                            </div>
                                                            <input type="hidden" class="form-control" id="asunto" name="asunto" placeholder="Asunto" value="Consulta desde página zulmabarrios">
                                                            <!-- Email input-->
                                                            <div class="form-group">
                                                              <label class="col-md-3 control-label" for="email">Email</label>
                                                              <div class="col-md-9">
                                                                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                                                              </div>
                                                            </div>
                                                    
                                                            <!-- Message body -->
                                                            <div class="form-group">
                                                              <label class="col-md-3 control-label" for="mensaje">Mensaje</label>
                                                              <div class="col-md-9">
                                                                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Por favor ingrese su mensaje aquí..." rows="5">{{'Hola, estoy interesado en esta propiedad cuyo código es '.$propiedad[0]->codigo.' y quisiera que me contacten para recibir más información.'}}</textarea>
                                                              </div>
                                                            </div>
                                                    
                                                            <!-- Form actions -->
                                                            
                                                            <div class="form-group">
                                                              <div class="col-md-6 col-md-offset-3 text-right" style="padding-top: 5%">
                                                                <input type="submit" id="submit" name="submit" class="btn btn-blue pull-right" value="Enviar">
                                                              </div>
                                                            </div>
                                                          </fieldset>
                                                      </form>
                                                    </div>
                                                  </div>
                                                  <div class="search-widget widget">
                                    <div class="title-widget">Seguir Buscando</div>
                                    <div class="content-widget">
                                        <div class="search-form row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="search-form-group"><label class="title-search-form">codigo</label><input id="busqueda-1-codigo" type="text" placeholder="Código de propiedad (Opcional)" class="input-form text-center"/></div>
                                            </div>
                                            <div class="col-md-12 col-xs-6">
                                                <div class="search-form-group"><label class="title-search-form">Propiedad</label>
                                                   <select id="select-tipopropiedad" class="input-form ">

                                                    </select>
                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-6">
                                                <div class="search-form-group"><label class="title-search-form">Operación</label>
                                                   <select id="select-operaciones" class="input-form">

                                                </select>
                                            </div>
                                            </div>
                                            
                                           
                                           <div class="text-center"><div id="busqueda-1" class="btn btn-blue white">Buscar</div></div>
                                        </div>
                                    </div>
                                  <div class="search-propertie-filters collapse">
                                        <div class="row">
                                         
                                        </div>
                                    </div>
                                </div>
                                             </div>
                                  <div class="search-propertie-filters collapse">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="air-conditioning" type="checkbox"/><label for="air-conditioning" class="type-checkbox">Air Condition</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="pool" type="checkbox" checked="checked"/><label for="pool" class="type-checkbox">pool</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="lift" type="checkbox"/><label for="lift" class="type-checkbox">lift</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="near-school" type="checkbox" checked="checked"/><label for="near-school" class="type-checkbox">near school</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="cable-tv" type="checkbox"/><label for="cable-tv" class="type-checkbox">cable TV</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="dishwasher" type="checkbox"/><label for="dishwasher" class="type-checkbox">Dishwasher</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="near-hospital" type="checkbox"/><label for="near-hospital" class="type-checkbox">near hospital</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-6">
                                                <div class="search-form-group"><input id="balcony" type="checkbox"/><label for="balcony" class="type-checkbox">Balcony</label></div>
                                            </div>
                                            <!--.col-md-2.col-sm-3.col-xs-4--><!--	.search-form-group.white--><!--		input#near-church(type='checkbox', checked)--><!--		label.type-checkbox(for='near-church') near church--><!--.col-md-2.col-sm-3.col-xs-4--><!--	.search-form-group.white--><!--		input#garages(type='checkbox', checked)--><!--		label.type-checkbox(for='garages') Garages--><!--.col-md-2.col-sm-3.col-xs-4--><!--	.search-form-group.white--><!--		input#wi-fi(type='checkbox', checked)--><!--		label.type-checkbox(for='wi-fi') wi-fi--><!--.col-md-2.col-sm-3.col-xs-4--><!--	.search-form-group.white--><!--		input#bedding(type='checkbox', checked)--><!--		label.type-checkbox(for='bedding') Bedding-->
                                        </div>
                                    </div>
                                </div>

                                @if($recomendadas)
                                <div class="title-widget">Recomendadas</div>
                                    @foreach($recomendadas as $reco)
                                        <div class="feature-widget widget">
                                            
                                            <div class="content-widget">
                                                <div class="media feature-item"><a class="media-left feature-img"><img src={{'/uploads/'.$reco->codigo.'/Thumbnail/'.$reco->codigo.'-0.JPG'}} alt=""/></a>

                                                    <div class="media-right media-middle feature-info"><a href={{'/propiedades/'.$reco->codigo.'/#galeria'}}  class="media-heading feature-title">
                                                        {{$reco->titulo}}</a>

                                                        <div class="info">
                                                            <div class="address"><i class="fa fa-map-marker"></i><span>{{$reco->localidad . ' - '.$reco->calle . ' '.$reco->numero}}</span></div>
                                                        </div>
                                                        <div class="info">

                                                            <div class="price">
                                                                @if($reco->operacion=='TODAS')
                                                                    <div class="price">
                                                                        <span>Compra/Venta/etc.</span>
                                                                    </div>
                                                                @else
                                                                    <span>{{$reco->operacion}}</span>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            @if($reco->valor==0)
                                                                <div class="price">
                                                                    <span>Consultar</span>
                                                                </div>
                                                            @else
                                                                <div class="price"><span>{{$reco->codmoneda . ' ' .number_format($reco->valor,0,',','.').'.-'}}</span><span class="price-of-rent"></span>
                                                                </div>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="banner-ads widget"><a href="#" class="link"><img src="assets/images/libs/Ads-2.jpg" alt=""/></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="map" class="section contact-map height-full-screen location"></div>
                
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
     <button type="button" id="spinner-loading" style="display: none">Submit</button>
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>
<div style="display: none" >
    <div id="calle">{{ $propiedad[0]->calle }}</div>
<div id="numero">{{ $propiedad[0]->numero }}</div>
<div id="localidad">{{ $propiedad[0]->localidad }}</div>
<div id="provincia">{{ $propiedad[0]->provincia }}</div>
<div id="pais">{{ $propiedad[0]->pais }}</div>
</div>


@stop

@section('script')
    {{HTML::script("assets/js/pages/property-detail.js")}}
    {{HTML::script("assets/js/busqueda.js")}}
    {{HTML::script("assets/js/mis-mapas.js")}}
@stop