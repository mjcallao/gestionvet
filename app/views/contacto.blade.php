@extends('layout')

    <!-- Body principal -->

@section('content')
  <div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                <div class="section page-title contact-us-page bg-overlay">
                    <div class="container">
                        <div class="page-title-wrapper"><h2 class="captions texto-mi-color">Contacto</h2>
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li class="active"><a href="#">Contáctenos</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="section section-zindex">
                    <div class="contact">
                        <div class="container">
                            
                                <div class="contact-header">
                                    <div class="row">
                                        
                                            <div class="col-md-3 col-xs-6">
                                                <div class="contact-info-item"><i class="icon fa fa-map-signs"></i>

                                                    <p class="title">Ubicación</p>

                                                    <p class="text">Sangento Cabral 1954 - Canning</p></div>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="contact-info-item"><i class="icon fa fa-envelope-o"></i>

                                                    <p class="title">Email</p>

                                                    <p class="text">zulmabarriospropiedades@gmail.com</p></div>
                                            </div>
                                        
                                       
                                            <div class="col-md-3 col-xs-6">
                                                <div class="contact-info-item"><i class="icon fa fa-phone"></i>

                                                    <p class="title">Teléfonos</p>

                                                    <p class="text">[54-11] 6079-1509</p>
                                                    <p class="text">[54-11] 4991-3487</p>
                                                 </div>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="contact-info-item"><i class="icon fa fa-print"></i>

                                                    <p class="title">Nextel</p>

                                                    <p class="text">240*1034</p></div>
                                            </div>
                                        
                                    </div>
                                </div>
                                 <button type="button" id="spinner-loading" style="display: none">Submit</button>
                                <div class="">
                                    <div class="new-letter-content"><h4 class="title texto-mi-color" style="padding-top: 10px;">Contáctenos</h4>

                                        <p class="text">Envíenos su consulta, le respondremos a la brevedad.</p>

                                                                        <div class="form-area">  
                                        <form id="mensaje-contacto" method="post" role="form">
                                           
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto" required>
                                                </div>
                                                <div class="form-group">
                                                <textarea class="form-control" type="textarea" id="mensaje" name="mensaje" placeholder="Mensaje"  rows="10" required></textarea>
                                                   <!--  <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>     -->                
                                                </div>
                                                <input type="submit" id="submit" name="submit" class="btn btn-blue pull-right" value="Enviar">                                            
                                        </form>
                                    </div>
                                    </div>
                                </div>
                               
                            
                        </div>
                    </div>
                </div>
                <br>
                <div class="section">
                    <div id="map" class="contact-map height-full-screen"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>


@stop
@section('script')
    {{HTML::script("assets/js/mapa-zulma.js")}}   
    {{HTML::script("assets/js/busqueda.js")}}
@stop
