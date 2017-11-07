@extends('layout')

    <!-- Body principal -->

@section('content')
<!-- WRAPPER-->
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                <div class="section page-title property-view bg-overlay">
                    <div class="container">
                        <div class="page-title-wrapper"><h2 class="captions texto-mi-color">zulma barrios</h2>
                            <ol class="breadcrumb">
                                <li><h4 style="color: white">Resultado de la busqueda</h4></li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="section property-view">
                    <div class="container margin-top">
                        
                        <div class="clearfix"></div>
                        <div class="property-wrapper padding-top">
                            <div class="row">
                                <div class="col-md-8 property-content">
                                    <div class="row">
                                        <div id="loading"><img id="loading-image" src="assets/images/loader.gif" alt="load list"/></div>
                                            @if($propiedades)
                                                @foreach($propiedades as $propiedad)
                                            <div class="property-item col-xs-6">
                                                <div class="sunhouse-item"><a href={{'/propiedades/'.$propiedad->codigo}} class="wrapper-image"><img src={{'/uploads/'.$propiedad->codigo.'/Thumbnail/'.$propiedad->codigo.'-0.JPG'}} alt="" class="img-responsive layout-1"/><img src={{'/uploads/'.$propiedad->codigo.'/Thumbnail/'.$propiedad->codigo.'-1.JPG'}} alt="" class="img-responsive layout-2"/></a>
                                                  @if($propiedad->operacion_id==1)
                                                        <div class="note for-sale"><p class="text">Venta</p></div>
                                                    @elseif($propiedad->operacion_id==2)
                                                        <div class="note for-rent"><p class="text">Alquiler</p></div>
                                                    @elseif($propiedad->operacion_id==3)
                                                         <div class="note permuta"><p class="text">Permuta</p></div>
                                                    @else
                                                         <div class="note permuta"><p class="text">Alq. Vent. Per.</p></div>
                                                    @endif
                                                <div class="codigo"><p id="codigo">{{'codigo: '.$propiedad->codigo}}</p></div>
                                                <div class="wrapper-content">
                                                    <div class="info-house">
                                                        <div class="info"><i class="icon-house_1"></i>

                                                            <p>{{'Metros '.$propiedad->mtstotal}}</p></div>
                                                        <div class="info"><i class="icon-bed"></i>

                                                            <p>{{'Habitaciones '.$propiedad->habitaciones}}</p></div>
                                                        <div class="info"><i class="icon-bath"></i>

                                                            <p>{{'Baños '.$propiedad->banios}}</p></div>
                                                    </div>
                                                    <div class="about-house"><a href={{'/propiedades/'.$propiedad->codigo.'/#galeria'}} class="title">{{$propiedad->titulo}}</a>

                                                        <p class="text">{{$propiedad->tipopropiedad}}</p></div>
                                                    <div class="more-info-house">
                                                        <div class="place-house"><i class="fa fa-map-marker"></i><a href="#">{{$propiedad->calle .' '.$propiedad->numero}}</a>
                                                        </div>
                                                        <div class="price">
                                                            @if($propiedad->valor==0)
                                                                <div class="price">
                                                                    <span>Consultar</span>
                                                                </div>
                                                            @else
                                                                <div class="price"><span>{{$propiedad->codmoneda . ' ' .number_format($propiedad->valor,0,',','.').'.-'}}</span><span class="price-of-rent"></span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                     @endif
                                        <div class="clearfix"></div>
                                       <!--  <ul class="pagination col-md-12">
                                            <li class="pagi-item disable"><a href="#" class="link-pagination">Previous</a></li>
                                            <li class="pagi-item active"><a href="#" class="link-pagination">1</a></li>
                                            <li class="pagi-item"><a href="#" class="link-pagination">2</a></li>
                                            <li class="pagi-item"><a href="#" class="link-pagination">...</a></li>
                                            <li class="pagi-item"><a href="#" class="link-pagination">9</a></li>
                                            <li class="pagi-item"><a href="#" class="link-pagination">10</a></li>
                                            <li class="pagi-item"><a href="#" class="link-pagination">Next</a></li>
                                        </ul> -->
                                    </div>
                                </div>
                                <div class="col-md-4 sidebar">
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
                                     <hr>
                                            <!--### EMPIEZA CATEGORIAS ##-->
                                                
                                                    <div class="container padding-bottom-40">
                                                       @if($operaciones)
                                                        <div class="title-widget">Categorías</div>
                                                            <div class="row">
                                                                <div class="col-md-offset-1">
                                                                    <ul>
                                                                        @foreach($operaciones as $operacion)
                                                                            @if($operacion->operacion<>'TODAS')
                                                                                <li><a href="{{ URL::to('/propiedades/operaciones/'.$operacion->id) }}" title="">{{$operacion->operacion.' ('.$operacion->total.')'}}</a></li>
                                                                           @endif     
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <br>
                                                        @if($categorias)
                                                            <div class="row">
                                                                <div class="col-md-offset-1">
                                                                    <ul>
                                                                        @foreach($categorias as $categoria)
                                                                            @if($categoria->tipopropiedad<>'TODAS')
                                                                                <li><a href="{{ URL::to('/propiedades/categorias/'.$categoria->id) }}" title="">{{$categoria->tipopropiedad.' ('.$categoria->total.')'}}</a></li>                                                                       
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                
       

                                            <!--### TERMINA CATEGORIAS ##-->        
                                  <div class="search-propertie-filters collapse">
                                        <div class="row">
                                        
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
                        <div class="row">
                            <div  class="text-center">
                                {{$propiedades->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>
@stop
@section('script')
    {{HTML::script("assets/js/busqueda.js")}}
   <!--  {{HTML::script("assets/js/pages/properties.js")}} -->
@stop
