$(document).on('ready', function() 
{

   $('#panel').on('focus', '.container #pais-nuevo', function(e){
      $.ajax({
            url: '/paises',
            success: function(data){
                var paises=[];
                $.each(data.paises, function(i, item){
                   paises.push(item.pais);
                });
                $('#pais-nuevo').autocomplete({
                  source:paises,
                  close: function(){
                    $('#provincia-nuevo').focus();
                    $('#provincia-nuevo').select();
                  },
                });
            },
      });//cierra ajax
  });

  $('#panel').on('focus', '.container #provincia-nuevo', function(e){
      $.ajax({
            url : '/provincias',
            data: {'pais' : $('#pais-nuevo').val()},
            success: function(data){
                var provincias=[];
                $.each(data.provincias, function(i, item){
                   provincias.push(item.provincia);
                });//cierra each
                $('#provincia-nuevo').autocomplete({
                  source:provincias,
                  close: function(){
                    $('#partido-nuevo').focus();
                    $('#partido-nuevo').select();
                  },
                });
            },
      });//cierra ajax
  });

  $('#panel').on('focus', '.container #partido-nuevo', function(e){
      $.ajax({
            url : '/partidos',
            data: {'provincia' : $('#provincia-nuevo').val()},
            success: function(data){
                var partidos=[];
                $.each(data.partidos, function(i, item){
                   partidos.push(item.partido);
                });//cierra each
                $('#partido-nuevo').autocomplete({
                  source:partidos,
                  close: function(){
                    $('#localidad-nuevo').focus();
                    $('#localidad-nuevo').select();
                  },

                });
            },
      });//cierra ajax
  });


  $('#panel').on('focus', '.container #localidad-nuevo', function(e){
      $.ajax({
            url : '/localidades',
            data: {'partido' : $('#partido-nuevo').val()},
            success: function(data){
                var localidades=[];
                $.each(data.localidades, function(i, item){
                   localidades.push(item.localidad);
                });//cierra each
                $('#localidad-nuevo').autocomplete({
                  source:localidades,
                  close: function(){
                    $('#localidad-nuevo').focus();
                    $('#localidad-nuevo').select();
                  },

                });
            },
      });//cierra ajax
  });

  //---## AGREGA UN PAIS NUEVO ##---//
  $('#panel').on('click', '.container #btn-agrega-pais', function(e){     
    $('#formulario-agrega-pais').submit(function(e){
        e.preventDefault();
        var PAIS = {
          'pais' : $('#pais-nuevo').val()
        }

        $.ajax({
          url: '/paises/store',
          type: 'POST',
          dataType: 'json',
          data: {'PAIS': JSON.stringify(PAIS)},
          success : function(data){
            if (data.success==true) {
                alert(data.msj);                
                $('#pais-nuevo').focus();
                $('#pais-nuevo').val('');
            } else{
                alert(data.msj);
                $('#pais-nuevo').focus();
                $('#pais-nuevo').val('');
            };
          },
        });//cierra ajax
        return false;
    });//submit
  });//cierra on
  

  //---## AGREGA UNA PROVINCIA NUEVA ##---//
  $('#panel').on('click', '.container #btn-agrega-provincia', function(e){     
    $('#formulario-agrega-provincia').submit(function(e){
        e.preventDefault();
        var PROVINCIA = {
          'pais'      : $('#pais-nuevo').val(),
          'provincia' : $('#provincia-nuevo').val(),
        }

        $.ajax({
          url: '/provincias/store',
          type: 'POST',
          dataType: 'json',
          data: {'PROVINCIA': JSON.stringify(PROVINCIA)},
          success : function(data){
            if (data.success==true) {
                alert(data.msj);                
                $('#pais-nuevo').focus();
                $('#pais-nuevo').val('');
            } else{
                alert(data.msj);
                $('#pais-nuevo').focus();
                $('#pais-nuevo').val('');
            };
          },
        });//cierra ajax
        return false;
    });//submit
  });//cierra on
    
  //---## AGREGA UN PARTIDO NUEVO ##---//
  $('#panel').on('click', '.container #btn-agrega-partido', function(e){     
    $('#formulario-agrega-partido').submit(function(e){
        e.preventDefault();
        var PARTIDO = {
          'pais'      : $('#pais-nuevo').val(),
          'provincia' : $('#provincia-nuevo').val(),
          'partido'   : $('#partido-nuevo').val()
        }

        $.ajax({
          url: '/partidos/store',
          type: 'POST',
          dataType: 'json',
          data: {'PARTIDO': JSON.stringify(PARTIDO)},
          success : function(data){
            if (data.success==true) {
                alert(data.msj);                
                $('#pais-nuevo').focus();
            } else{
                alert(data.msj);
                $('#pais-nuevo').focus();
            };
          },
        });//cierra ajax
        return false;
    });//submit
  });//cierra on

  //---## AGREGA UNA LOCALIDAD NUEVA ##---//
  $('#panel').on('click', '.container #btn-agrega-localidad', function(e){     
    $('#formulario-agrega-localidad').submit(function(e){
        e.preventDefault();
        var LOCALIDAD = {
          'pais'      : $('#pais-nuevo').val(),
          'provincia' : $('#provincia-nuevo').val(),
          'partido'   : $('#partido-nuevo').val(),
          'localidad' : $('#localidad-nuevo').val(),
        }

        $.ajax({
          url: '/localidades/store',
          type: 'POST',
          dataType: 'json',
          data: {'LOCALIDAD': JSON.stringify(LOCALIDAD)},
          success : function(data){
            if (data.success==true) {
                alert(data.msj);                
                $('#pais-nuevo').focus();
            } else{
                alert(data.msj);
                $('#pais-nuevo').focus();
            };
          },
        });//cierra ajax
        return false;
    });//submit
  });//cierra on
});