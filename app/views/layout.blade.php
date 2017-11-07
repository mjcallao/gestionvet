<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sine Nomine - Hospital Veterinario -</title>
    <!-- Font css-->
     {{ HTML::style("http://fonts.googleapis.com/css?family=Roboto:300,400,700,900")}}
     {{ HTML::style("assets/font/font-icon/font-awesome-4.4.0/css/font-awesome.css")}}
     {{ HTML::style("assets/font/font-icon/font-svg/style.css")}}
    <!-- Library css-->
     {{ HTML::style("assets/libs/bootstrap-3.3.6/css/bootstrap.min.css")}}
     {{ HTML::style("assets/libs/animate/animate.css")}}
     {{ HTML::style("assets/libs/owl-carousel-2.0/assets/owl.carousel.css")}}
     {{ HTML::style("assets/libs/selectbox/css/jquery.selectbox.css")}}
     {{ HTML::style("assets/libs/range-slider/jquery.nstSlider.min.css")}}
     {{ HTML::style("assets/libs/datetimepicker/css/bootstrap-datetimepicker.css")}}
     {{ HTML::style("assets/libs/fancybox/css/jquery.fancybox.css")}}
     {{ HTML::style("assets/libs/fancybox/css/jquery.fancybox-buttons.css")}}
     {{ HTML::style("assets/libs/slick/slick.css")}}
     {{ HTML::style("assets/libs/slick/slick-theme.css")}}
     {{ HTML::style("assets/libs/select2/select2.min.css")}}
     {{ HTML::style("assets/libs/jquery-ui/jquery-ui.css")}}
    <!-- style css-->
     {{ HTML::style("assets/css/layout.css")}}
     {{ HTML::style("assets/css/components.css")}}
     {{ HTML::style("assets/css/responsive.css")}}
    
     {{ HTML::style("//cdn.datatables.net/1.10.5/css/jquery.dataTables.css")}}
    <!--PLUGIN REMODAL CSS-->
     {{ HTML::style("/assets/libs/dist/remodal.css")}}
     {{ HTML::style("/assets/libs/dist/remodal-default-theme.css")}}
     {{ HTML::style("/assets/libs/simplePagination/simplePagination.css")}}
     {{ HTML::style("/assets/libs/dropzone/dropzone.css")}}
<!--      {{HTML::script("assets/libs/chosen/chosen.css")}} -->
     {{ HTML::style("assets/css/style.css")}}
     {{ HTML::style("assets/libs/spinner-loading/waitMe.css")}}
   
    <!-- LOADING SCRIPTS FOR PAGE-->
</head>
<body>
     
  @if (Auth::check())
     @include('menu.logueado')
  @else
     @include('menu.sinloguear')
  @endif
   
   <!--acá va el body-->
   	@yield('content')
    
    <!-- Footer -->
    @include('footer')

   
  <!--.body-2.loading<div class="dots-loader"></div>--><!-- JAVASCRIPT LIBS-->
{{HTML::script("assets/libs/jquery/jquery-2.1.4.min.js")}}
{{HTML::script("assets/libs/jquery-ui/jquery-ui.min.js")}}
<!-- {{HTML::script("assets/libs/chosen/chosen.jquery.js")}} -->
{{HTML::script("assets/libs/detect/browser.js")}}
{{HTML::script("assets/libs/moment/js/moment.min.js")}}
{{HTML::script("assets/libs/bootstrap-3.3.6/js/bootstrap.min.js")}}
{{HTML::script("assets/libs/datetimepicker/js/bootstrap-datetimepicker.min.js")}}
{{HTML::script("assets/libs/smooth-scroll/jquery-smoothscroll.js")}}
{{HTML::script("assets/libs/owl-carousel-2.0/owl.carousel.min.js")}}
{{HTML::script("assets/libs/fancybox/js/jquery.fancybox.js")}}
{{HTML::script("assets/libs/fancybox/js/jquery.fancybox-buttons.js")}}
{{HTML::script("assets/libs/appear/jquery.appear.js")}}
{{HTML::script("assets/libs/count-to/jquery.countTo.js")}}
{{HTML::script("assets/libs/wow-js/wow.min.js")}}
{{HTML::script("assets/libs/selectbox/js/jquery.selectbox-0.2.min.js")}}
{{HTML::script("assets/libs/select2/select2.min.js")}}
{{HTML::script("assets/libs/range-slider/jquery.nstSlider.min.js")}}
{{HTML::script("assets/libs/parallax/jquery.data-parallax.min.js")}}
{{HTML::script("assets/libs/slick/slick.min.js")}}
{{HTML::script("/assets/libs/dist/remodal.min.js")}}
{{HTML::script("/assets/libs/dropzone/dropzone.js")}}
{{HTML::script('//cdn.datatables.net/1.10.5/js/jquery.dataTables.js')}}
{{HTML::script("http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js")}}
{{HTML::script('assets/libs/simplePagination/jquery.simplePagination.js')}}
{{HTML::script("assets/js/main.js")}}
{{HTML::script("http://maps.google.com/maps/api/js")}}
{{HTML::script("assets/libs/gmaps/gmaps.min.js")}}
<!-- {{HTML::script("assets/js/mis-mapas.js")}} -->
{{HTML::script('assets/libs/autoNumeric/autoNumeric.js')}}
{{HTML::script("assets/js/subearchivos.js")}}
{{HTML::script("assets/libs/spinner-loading/waitMe.js")}}
<!-- {{HTML::script("assets/js/busqueda.js")}} -->
 <!--acá se cargan los script-->
 @yield('script')
 <!--VENTANAS MODALES-->
 <!--LOGIN-->
  <div class="remodal" data-remodal-id="modal-login">
      <button data-remodal-action="close" class="remodal-close"></button>
        <h2 class="text-muted">Iniciar Sesión</h2>
        <p>
            Una vez logueado podrá: dar de alta, modificar, eliminar.
        </p>
        <br>

        <form id="login-formulario" action="" method="POST">
            <div class="form-group">
                <div class="col-md-3 col-md-offset-3">
                    <input class="form-control" type="text" name="login-user" id="login-user" placeholder="Usuario" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    <input class="form-control" type="password" name="login-pass" id="login-pass" placeholder="Contraseña" autocomplete="off">
                </div>
            </div>

          <br>
          <br>
          <br>
          <div class="form-group">
            <button id="submit"  class="remodal-confirm">OK</button>  
          </div>          
        </form>
    </div>
    <!-- ############################## -->
    {{HTML::script("assets/js/login.js")}}
</body>
</html>

