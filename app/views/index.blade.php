@extends('layout')

    <!-- Body principal -->

@section('content')
  <div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                <div class="section">
                    <div class="search-properties" style="padding-top: 2%">
                        <div class="container">
                            <div class="search-properties-wrapper">
                                <div class="sunhouse-title white">
                                   <div class="search-properties-content">
                                    <form class="search-form row">
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="search-form-group white">
                                                <label class="title-search-form">Propiedad</label>
                                                    <select id="select-tipopropiedad" class="input-form ">

                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="search-form-group white">
                                                <label class="title-search-form">Operación</label>
                                                <select id="select-operaciones" class="input-form">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="search-form-group white"><label class="title-search-form">Código</label>
                                                <input id="busqueda-1-codigo" type="text" placeholder="Código de propiedad (Opcional)" class="input-form text-center"/></div>
                                        </div>
                                       <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="btn-search col-md-offset-2" style="padding-top: 10%"><div id="busqueda-1" class="btn btn-blue white">Buscar</div></div>
                                        </div>
                                       
                                      
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="section-zindex">
                    <!-- <div class="banner-01 banner-full-screen-2"></div> -->
                    <!-- Start Home Page Slider -->
                    <section id="home">
                        <!-- Carousel -->
                        <div id="main-slide" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ol class="carousel-indicators" id="indicadores">
                                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                                <li data-target="#main-slide" data-slide-to="1"></li>
                                <li data-target="#main-slide" data-slide-to="2"></li>
                            </ol>
                            <!--/ Indicators end-->

                            <!-- Carousel inner -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive" src="assets/images/slider/bg1.jpg" alt="mi-slider">
                                    <div class="slider-content ">
                                        <div class="col-md-12 text-center div-trans">
                                            <h2 class="animated2 white">
                                              <span><strong class="texto-mi-color">Sine Nomine Hospital Veterinario</strong>Servicios</span>
                                            </h2>
                                            <h3 class="animated3 white">
                                                <span>Vanguardia en negocios inmobiliarios</span>
                                            </h3>
                                            <p class="animated4"><!-- <a href="#buscador" class="slider btn btn-system btn-large texto-mi-color">Búsqueda avanzada</a> -->
                                            <!-- <a class="animated4 slider btn btn-default btn-min-block" href="#">Buscar</a> -->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 <!--/ Carousel item end -->
                                <div class="item">
                                    <img class="img-responsive" src="assets/images/slider/bg3.jpg" alt="mi-slider">
                                    <div class="slider-content">
                                        <div class="col-md-12 text-center div-trans">
                                            <h2 class="animated7 white">
                                                 <span>Amplio catálogo de<strong></strong></span>
                                            </h2>
                                            <h3 class="animated8 white">
                                            <span>Más de 200 inmuebles</span>
                                        </h3>   
                                            <div class="">
                                                <a class="animated4 slider btn btn-blue btn-min-block" href="/propiedades/listado">VER</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Carousel item end -->
                                <div class="item">
                                    <img class="img-responsive" src="assets/images/slider/bg2.jpg" alt="mi-slider">
                                    <div class="slider-content ">
                                        <div class="col-md-12 text-center div-trans">
                                            <h2 class="animated4 white">
                                            <span><strong class="texto-mi-color">Especialistas</strong> a su servicio</span>
                                        </h2>
                                            <h3 class="animated5 white">
                                            <span>Asesorarlo nos enorgullece</span>
                                        </h3>   
                                            <p class="animated6"><<!-- a href="#" class="slider btn btn-system btn-large">Buy Now</a> -->
                                            <a class="animated4 slider btn btn-blue btn-min-block" href="#contacto">Consulta</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                               
                                <!--/ Carousel item end -->
                            </div>
                            <!-- Carousel inner end-->

                            <!-- Controls -->
                            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                                <span><i class="fa fa-angle-left"></i></span>
                            </a>
                            <a class="right carousel-control" href="#main-slide" data-slide="next">
                                <span><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                        <!-- /carousel -->
                    </section>
                    <!-- End Home Page Slider -->
                </div>
               <!--  <div class="section">
                    <div class="about-house-section padding-top padding-bottom">
                        <div class="container">
                            <div class="about-house-wrapper">
                                <div class="about-house-banner">
                                    
                                   <div class="info-house">
                                        <div class="info"><i class="icon-house_1"></i>

                                            <p class="text">32.000 M<sup>2</sup></p></div>
                                        <div class="info"><i class="icon-bed"></i>

                                            <p class="text">8 Habitaciones</p></div>
                                        <div class="info"><i class="icon-bath"></i>

                                            <p class="text">4 Baños</p></div>
                                    </div>
                                </div>
                                <div class="about-house-content "><h1 class="title">Nosotros:</h1>

                                    <p class="text">Nos dedicamos a brindarles a nuestros clientes asesoramiento con un alto grado de profesionalismo, sin dejar de lado la atención personalizada. Nuestro principal objetivo es que nuestros clientes realicen una buena y segura inversión inmobiliaria, brindándoles una variada posibilidad de alternativas. 

                                    <p class="text">Para nosotros no sólo es primordial realizar juntos su mejor operación inmobiliaria, sino que vuelvan a contar con nuestro asesoramiento en sus futuras inversiones.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="section">
                    <div class="newest-properties padding-top">
                        <div class="container">
                            <div class="newest-properties-wrapper">
                                <div class="sunhouse-title">
                                    <div class="icon-image"><img src="assets/images/sineNomineLogoTransparente_chico.png" alt="" class="img-responsive"/><!--.icon-title--><!--    i.icon-church--></div>
                                    <br>
                                    <h2 class="main-title">Propiedades Destacadas</h2>

                                   <!--  <p class="sub-title">Haven't you heard about the recession: Topten reasons why you should properties</p> -->
                                </div>
                                    <br>
                                <div class="row" >
                                    <div class="newest-properties-content col-md-12 text-center" id="destacadas">

                                    </div>    
                                </div>
                                  <br>
                               
                              
                            </div>
                             <div class="container">
                                    <div class="row">

                                            <div id="paginador" class="text-center">

                                            </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="section" id="buscador">
                    <div class="search-properties padding-top padding-bottom">
                        <div class="container">
                            <div class="search-properties-wrapper">
                                <div class="sunhouse-title white">
                                    <div class="icon-image">
                                   </div>
                                    <h2 class="main-title">Encuentre su propiedad</h2>
                                    <br>
                                    <br>
                               
                                <div class="search-properties-content">
                                    <form class="search-form row">
                                      
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="search-form-group white"><label class="title-search-form">Propiedad</label>
                                                <select id="select-tipopropiedad" class="input-form ">

                                                    </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="search-form-group white"><label class="title-search-form">Operación</label>
                                                <select class="input-form">
                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="search-form-group white"><label class="title-search-form">Zona</label>
                                                <input type="text" placeholder="Ingrese la zona" class="input-form"/>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-2 col-md-4 col-sm-4 col-xs-6">
                                            <div class="search-form-group white"><label class="title-search-form">Habitaciones</label><select class="input-form">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select></div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="search-form-group white"><label class="title-search-form">Baños</label><select class="input-form">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select></div>
                                        </div>
                                      
                                      
                                        <div class="col-md-12">
                                            <div id="busqueda-1" class="btn btn-blue white">Buscar</div>
                                        </div>
                                    </form>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-propertie-filters collapse">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="air-conditioning" type="checkbox"/><label for="air-conditioning" class="type-checkbox">Aire acondicionado</label></div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="pool" type="checkbox" checked="checked"/><label for="pool" class="type-checkbox">Pileta</label></div>
                                </div>
                                
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="near-school" type="checkbox" checked="checked"/><label for="near-school" class="type-checkbox">Escuelas cercanas</label></div>
                                </div>
                             
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="dishwasher" type="checkbox"/><label for="dishwasher" class="type-checkbox">Lavavajillas</label></div>
                                </div>
                              
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="balcony" type="checkbox"/><label for="balcony" class="type-checkbox">Balcón</label></div>
                                </div>
                               
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="garages" type="checkbox" checked="checked"/><label for="garages" class="type-checkbox">Garages</label></div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <div class="search-form-group white"><input id="wi-fi" type="checkbox" checked="checked"/><label for="wi-fi" class="type-checkbox">wi-fi</label></div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div> -->
                  <div class="section">
                    <div class="find-best-house bg-overlay padding-bottom padding-top">
                        <div class="container">
                            <div class="find-best-house-wrapper"><p class="sub-title sub-titulo" >Nosotros proveemos el servicio</p>

                                <h2 class="title" style="color: white">Usted encuentre la mejor casa para su vida</h2>

                                <p class="content">Disponemos de una amplia variedad de propiedades.</p><a href="/propiedades/listado" class="btn btn-blue">Ver</a></div>
                        </div>
                    </div>
                </div>
                <div class="section" id="nuestros-servicios">
                    <div class="our-service padding-top">
                        <div class="container">
                            <div class="our-service-wrapper">
                                <div class="sunhouse-title">
                                    
                                    <h2 class="main-title">Nuestros servicios</h2>

                                    <p class="sub-title">Ofrecemos soluciones integrales a sus necesidades inmobiliarias</p></div>
                                <div class="row">
                                    <div class="our-service-content">
                                        <div class="col-md-3">
                                            <div data-wow-delay="0.2s" data-wow-duration="1s" class="our-service-items wow fadeInUp">
                                                <div class="icon-wrapper"><i class="icon-our-service icon-house_sell"></i></div>
                                                <p class="name">Asesoramiento de Venta</p>

                                                <p class="text">Nuestro estudio estará a su disposición para tratar cualquier consulta o trámite que sea menester para la compraventa.</p></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div data-wow-delay="0.45s" data-wow-duration="1s" class="our-service-items wow fadeInUp">
                                                <div class="icon-wrapper"><i class="icon-our-service icon-rent"></i></div>
                                                <p class="name">Asesoramiento de Alquiler</p>

                                                <p class="text">Ofrecemos diferentes alternativas para realizar sus Proyectos con el mayor Asesoramiento Jurídico.</p></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div data-wow-delay="0.7s" data-wow-duration="1s" class="our-service-items wow fadeInUp">
                                                <div class="icon-wrapper"><i class="icon-our-service icon-house_2"></i></div>
                                                <p class="name">Servicios de Administración</p>

                                                <p class="text">Efectuamos la administración y cobranza de alquileres. Verificamos el cumplimiento de expensas, servicios e impuestos, y el estado del inmueble.</p></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div data-wow-delay="0.95s" data-wow-duration="1s" class="our-service-items wow fadeInUp">
                                                <div class="icon-wrapper"><i class="icon-our-service icon-brush"></i></div>
                                                <p class="name">Análisis del mercado</p>

                                                <p class="text">Realizamos estudio de mercado, el cual ayudará a mejorar la toma de decisiones en el proyecto inmobiliario a encarar.</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>             
                <div class="section" id="contacto">
                    <div class="contact-us">
                        <div class="container">
                            <div data-parallax="{&quot;y&quot;:&quot;20%&quot;}" class="contact-us-scroll">
                                <div class="contact-us-wrapper">
                                    <div class="contact-us-content" style="padding-left: 7%"><h2 class="title">Contáctenos</h2>

                                        <p class="text">Complete el formulario o comuníquese a nuestros teléfonos.</p>

                                        <div class="info-list">
                                            <ul class="list-unstyled">
                                                <li class="info-line"><i class="info-icon fa fa-map-marker"></i><a href="#" class="info-text">Sargento Cabral 1954 - Canning </a></li>
                                                <li class="info-line"><i class="info-icon fa fa-phone"></i><a href="#" class="info-text">[54-11] 6079-1509</a></li>
                                                <li class="info-line"><i class="info-icon fa fa-phone"></i><a href="#" class="info-text">[54-11] 4991-3487</a></li>
                                                <li class="info-line"><i class="info-icon fa fa-phone"></i><a href="#" class="info-text">Nextel 240*1034</a></li>
                                                <li class="info-line"><i class="info-icon fa fa-envelope-o"></i><a href="#" class="info-text">zulmabarriospropiedades@gmail.com</a></li>
                                                <!-- <li class="info-line"><i class="info-icon fa fa-skype"></i><a href="#" class="info-text">domain.sunhouse</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-us-wrapper">
                                    <div class="new-letter-content" style="padding-right: : 7%"><h4 class="title">MENSAJE</h4>

                                        <p class="text">Envíenos su consulta, le respondremos a la brevedad.</p>

                                                <div class="row">
                                                  <div class="col-md-12 ">
                                                    <div class="well well-sm">
                                                      <form  id="mensaje-index" method="post">
                                                          <fieldset>
                                                    
                                                            <!-- Name input-->
                                                            <div class="form-group">
                                                              <label class="col-md-3 control-label" for="name">Nombre</label>
                                                              <div class="col-md-9">
                                                                <input id="nombre" name="nombre" type="text" placeholder="Apellido y Nombre" class="form-control" required>
                                                              </div>
                                                            </div>
                                                    
                                                            <!-- Email input-->
                                                            <div class="form-group">
                                                              <label class="col-md-3 control-label" for="email">Email</label>
                                                              <div class="col-md-9">
                                                                <input id="email" name="email" type="text" placeholder="Email" class="form-control" required>
                                                              </div>
                                                            </div>
                                                            <input type="hidden" class="form-control" id="asunto" name="asunto" placeholder="Asunto" value="Consulta desde página zulmabarrios">
                                                            <!-- Message body -->
                                                            <div class="form-group">
                                                              <label class="col-md-3 control-label" for="mensaje">Mensaje</label>
                                                              <div class="col-md-9">
                                                                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Por favor ingrese su mensaje aquí..." rows="5" required></textarea>
                                                              </div>
                                                            </div>
                                                    
                                                            <!-- Form actions -->
                                                            
                                                            <div class="form-group">
                                                              <div class="col-md-6 col-md-offset-3 text-right" style="padding-top: 5%">                        
                                                                <input type="submit" class="btn btn-blue" value="Enviar Mensaje">
                                                              </div>
                                                            </div>
                                                          </fieldset>
                                                      </form>
                                                    </div>
                                                  </div>
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <button type="button" id="spinner-loading" style="display: none">Submit</button>
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>

@stop
@section('script')
    {{HTML::script("assets/js/busqueda.js")}}
@stop


<!-- https://mega.nz/#!z5kkQKaQ!sT0W608Tos9uaP9o75gowZaFnEBbzYHaytHss-4Hpo8
https://mega.nz/#!PpkgQTQa!d1Gfe6JlRg4P2E4E3lv7--nnWu4c5A3gU5A6RXMHEnM
https://mega.nz/#!yp92WKCK!wM8oWwJ4o9N2ZmeFwb7uAbiPW86pfBqGl3QS-Fzlc8E
https://mega.nz/#!7td1hRLC!ecJo_JPrWUBqAsb2VZN3ViBI7SRT1fNjGbJhUgIyzaQ
https://mega.nz/#!i0Vz1aJR!xhCuHLifHZwvtf4hnefljqkbdy2B3YGrHIAHpl0lTJU
https://mega.nz/#!z9lx0YTY!J8LwPoop8edClkzXbfp05xES1pY_4cdtxmMprYwCDHY -->
