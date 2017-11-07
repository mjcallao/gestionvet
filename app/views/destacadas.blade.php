@if($destacadas)
    @foreach($destacadas as $propiedad)
                <div class="col-md-4 col-xs-6" id={{$propiedad->codigo}} >
                    <div class="sunhouse-item">
                        <a href={{'/propiedades/'.$propiedad->codigo.'/#galeria'}} class="wrapper-image">
                            <img src={{'/uploads/'.$propiedad->codigo.'/Thumbnail/'.$propiedad->codigo.'-0.JPG'}} alt="" class="img-responsive layout-1"/>
                            <img src={{'/uploads/'.$propiedad->codigo.'/Thumbnail/'.$propiedad->codigo.'-1.JPG'}} alt="" class="img-responsive layout-2"/>
                        </a>
                        @if($propiedad->operacion_id==1)
                            <div class="note for-sale"><p class="text">Venta</p></div>
                        @elseif($propiedad->operacion_id==2)
                            <div class="note for-rent"><p class="text">Alquiler</p></div>
                        @elseif($propiedad->operacion_id==3)
                             <div class="note permuta"><p class="text">Permuta</p></div>
                        @else
                             <div class="note permuta"><p class="text">Alq. Vent. Per.</p></div>
                        @endif
                       
                        <div class="wrapper-content">
                            <div class="info-house">
                                <div class="info"><i class="icon-house_1"></i>

                                    <p>{{'Metros '.$propiedad->mtstotal}}</p></div>
                                <div class="info"><i class="icon-bed"></i>

                                    <p>{{'Habitaciones '.$propiedad->habitaciones}}</p></div>
                                <div class="info"><i class="icon-bath"></i>

                                    <p>{{'Baños '.$propiedad->banios}}</p></div>
                            </div>
                             <div class="codigo"><a href={{'/propiedades/'.$propiedad->codigo.'/#galeria'}} id="codigo">{{'codigo: '.$propiedad->codigo}}</a></div>
                            <div class="about-house"><a href={{'/propiedades/'.$propiedad->codigo.'/#galeria'}} class="title">{{$propiedad->titulo}}</a>

                                <p class="text">{{$propiedad->tipopropiedad}}</p></div>
                            <div class="more-info-house">
                                <div class="place-house"><i class="fa fa-map-marker"></i><a href="#">{{$propiedad->calle .' '.$propiedad->numero}}</a></div>
                                @if($propiedad->valor==0)
                                    <div class="price">
                                        Consultar
                                    </div>
                                @else
                                    <div class="price">{{$propiedad->codmoneda . ' ' .number_format($propiedad->valor,0,',','.').'.-'}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

    @endforeach
      <!--   <div id="paginador" >
        {{$destacadas->links()}}
    </div> -->
@endif
