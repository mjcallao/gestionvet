$(document).on('ready', function() 
{    
    $('#listado-propiedades').on('click', function(event){
        event.preventDefault();
        $.ajax({
          url: '/propiedades',
          type: 'GET',
          //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          //data: {param1: 'value1'},
          success: function(data){
            $('#botones').empty();
            $('#panel').empty();
            $('#panel').html(data);
            var table = $('#tabla-propiedades').DataTable( {
                scrollY:        400,
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns:   true
            } );
          }//cierra success
        });//cierra ajax
      });
    
    // var fila;
    // $('#panel').on('click', '#tabla-propiedades tr', function(e){
    //     var tabla = $('#tabla-propiedades').DataTable();
    //     var id = tabla.row(this).index();
    //     alert(id); 
    // });

   

    //---## BOTON QUE LLAMA EL FORMULARIO PARA EDITAR UNA PROPIEDAD ##---//
    $('#panel').on('click', '#tabla-propiedades tr td div[id^=edita-]', function(e){ 
        //e.stopPropagation();       
        var cadena = $(this).attr('id');
        var CODIGO = cadena.substring(6);
        if (confirm('¿Desea editar la propiedad '+CODIGO+'?')){ 
            $.ajax({
              url: '/propiedades/edit',
              type: 'POST',
              dataType: 'json',
              data: {'CODIGO':CODIGO},
              success : function(data){
                if (data.success==true) {
                  $('#panel').empty();
                  $('#panel').html(data.data);
                };
              }     
            });
        }//CIERRA IF
    });

    //---## ELIMINA UNA PROPIEDAD CON TODA SU INFORMACION EN LA BBDD Y LAS FOTOS DEL DISCO ##---//
    $('#panel').on('click', '#tabla-propiedades tr td div[id^=elimina-]', function(e){ 
        //e.stopPropagation(); 
        var cadena = $(this).attr('id');
        var CODIGO = cadena.substring(8); 
        if (confirm('¿Desea eliminar la propiedad '+CODIGO+'?. Se borrarán todos sus datos y sus imágenes definitivamente')){       
          $.ajax({
            url: '/propiedades/destroy',
            type: 'POST',
            dataType: 'json',
            data: {'CODIGO':CODIGO},
            success : function(data){
              if (data.success==true) {
                  alert(data.msj);
                  $('#listado-propiedades').trigger('click');
              }else{
                  alert(data.msj);
              }
            }     
          });
        }//cierra if     
    });

  
  

    //---## BOTON QUE AGREGA FOTOS A UNA PROPIEDAD ##---//
    $('#panel').on('click', '#tabla-propiedades tr td div[id^=foto-]', function(e){ 
        //e.stopPropagation(); 
        var cadena = $(this).attr('id');
        var CODIGO = cadena.substring(5); 
        if (confirm('¿Desea agregar fotos a la propiedad '+CODIGO+'?')){       
          $.ajax({
            url: '/files/create',
            type: 'POST',
            dataType: 'json',
            data: {'CODIGO':CODIGO},
            success : function(data){
                if (data.success==true) {
                    $('#panel').empty();
                    $('#panel').html(data.data);
                    // $('#dropzone').addClass('dropzone');


                    

                };
                
            }     
          });
        }//cierra if     
    });
    $('#panel').on('focus', '#edita-propiedad-tipo', function(e) {
        $('#edita-propiedad-tipo').select(); 
          $.ajax({
              url: '/tipopropiedades',
              success: function(data){
                var tipo=[];
                $.each(data.tipopropiedades, function(i, item){
                   tipo.push(item.tipopropiedad);
                });
                $('#edita-propiedad-tipo').autocomplete({
                  source:tipo,
                  close: function(){
                    $('#edita-pais').focus();
                    $('#edita-pais').select();
                  },
                }); 
              },
              
            });
    });
    
    $('#panel').on('focus', '#edita-pais', function(e) {
        $('#edita-pais').select(); 
        $.ajax({
            url: '/paises',
            success: function(data){
                var paises=[];
                $.each(data.paises, function(i, item){
                   paises.push(item.pais);
                });
                $('#edita-pais').autocomplete({
                  source:paises,
                  close: function(){
                    $('#edita-provincia').focus();
                    $('#edita-provincia').select();
                  },
                });
            },
        });
    });

    $('#panel').on('focus', '#edita-provincia', function(e) {
        $('#edita-provincia').select(); 
        $.ajax({
            url: '/provincias',
            data: {'pais' : $('#edita-pais').val()},
            success: function(data){
              var provincias=[];
              $.each(data.provincias, function(i, item){
                 provincias.push(item.provincia);
              });
                $('#edita-provincia').autocomplete({
                  source:provincias,
                  close: function(){
                    $('#edita-partido').focus();
                    $('#edita-partido').select();
                  },
                });
            },
        });
    });

    $('#panel').on('focus', '#edita-partido', function(e) {
        $('#edita-partido').select(); 
        $.ajax({
            url: '/partidos',
            data: {'provincia' : $('#edita-provincia').val()},
            success: function(data){
              var partidos=[];
              $.each(data.partidos, function(i, item){
                 partidos.push(item.partido);
              });
                $('#edita-partido').autocomplete({
                  source:partidos,
                  close: function(){
                    $('#edita-localidad').focus();
                    $('#edita-localidad').select();
                  },
                });
            },
        });
    });

    $('#panel').on('focus', '#edita-localidad', function(e) {
        $('#edita-localidad').select(); 
        $.ajax({
            url: '/localidades',
            data: {'partido' : $('#edita-partido').val()},
            success: function(data){
              var localidades=[];
              $.each(data.localidades, function(i, item){
                 localidades.push(item.localidad);
              });
                $('#edita-localidad').autocomplete({
                  source:localidades,
                  close: function(){
                    $('#edita-calle').focus();
                    $('#edita-calle').select();
                  },
                });
            },
        });
    });


     $('#panel').on('focus', '#edita-operacion', function(e) {
        $('#edita-operacion').select(); 
        $.ajax({
           url: '/operaciones',
                success: function(data){
                  var operaciones=[];
                  $.each(data.operaciones, function(i, item){
                     operaciones.push(item.operacion);
                  });
                  $('#edita-operacion').autocomplete({
                    source:operaciones,
                    close: function(){
                      $('#edita-metros-cubiertos').focus();
                      $('#edita-metros-cubiertos').select();
                    },
                  }); 
                },
        });
    });

     $('#panel').on('focus', '#edita-numero, #edita-metros-cubiertos, #edita-metros-semi-cubiertos, #edita-metros-totales, #edita-plantas, #edita-ambientes, #edita-banios, #edita-precio', function(e) {        
        $('.cantidad').autoNumeric('init',{
          aSep  : '',     
          vMax  : '999999999',
          vMin  : '0',
          mDec  : '0'
        });
    });

     $('#panel').on('focus', '#edita-moneda', function(e) {
        $('#edita-moneda').select(); 
         $.ajax({
              url: '/monedas',
              success: function(data){
                var monedas=[];
                $.each(data.monedas, function(i, item){
                   monedas.push(item.moneda);
                });
                $('#edita-moneda').autocomplete({
                  source:monedas,
                  close: function(){
                    $('#edita-precio').focus();
                    $('#edita-precio').select();
                  },
                }); 
              },
            });
    });


    //---## COMPRUEBA QUE LAS FOTOS MARCADAS COMO ##---// 
    //---## PORTADA NO SEAS MÁS DE DOS #############---//
    $('#panel').on('click', '#formulario-edita-propiedad input[name^=portada-]', function(){
         //---## COMPRUEBA QUE LA IMAGEN NO ESTE SELECCIONADA PARA ELIMINARSE Y PARA SER PORTADA ##---//
         if ($("input[name^=portada-"+$(this).attr('id')+"]:checked").val()==1 && $("input[name^=elimina-imagen-"+$(this).attr('id')+"]:checked").val()==1) {
            alert('Esta imagen ha sido seleccionada para eliminarse, no puede ser portada.');
            //alert($("input[name^=elimina-imagen-"+$(this).attr('id')+"]:checked").val());
            $("input[name^=portada-"+$(this).attr('id')+"][value=0]").prop('checked', true);
         };
         var portada = 0;
         $('input[name^=portada-]:checked').each(function(){
            if ($(this).val()==1) {
              portada = portada + 1;
            }; 
            if (portada>2) {
                alert('No se pueden tener más de dos fotos de portada');
                portada = portada - 1; 
                $("input[name^=portada-"+$(this).attr('id')+"][value=0]").prop('checked', true);
            };          
         });//cierra each
    });


    $('#panel').on('click', '#formulario-edita-propiedad input[name^=elimina-imagen-]', function(e){
        //---## COMPRUEBA QUE QUEDEN AL MENOS DOS IMAGENES DE LA PROPIEDAD ##---//
        var borrar = 0;
        var imagenes = 0;
        $('input[name^=elimina-imagen-]:checked').each(function(event){
            //---## CUENTA LA CANTIDAD DE IMAGENES QUE TIENE LA PROPIEDAD ##---//
            imagenes = imagenes + 1;
            //---## CUENTA LA CANTIDAD DE IMAGENES A ELIMINAR ##---//
            if ($("input[name^=elimina-imagen-"+$(this).attr('id')+"]:checked").val()==1) {
                borrar = borrar + 1;
            }
        });
        //alert('borrar '+borrar+ ' : '+' imagenes '+imagenes);
        //---## COMPRUEBA QUE AL MENOS QUEDEN DOS IMAGENES DE LA PROPIEDAD ##---//
        if ((imagenes - borrar) < 2) {
            alert('Cada propiedad debe tener como mínimo dos imágenes, no se puede eliminar.')
            return false;
        }
        if (imagenes<3) {
            alert('Cada propiedad debe tener como mínimo dos imágenes, no se puede eliminar.')
            return false;
        }

        $("input[name^=elimina-imagen-]:checked").val()==1
         //---## COMPRUEBA QUE LA IMAGEN NO ESTE SELECCIONADA PARA ELIMINARSE Y PARA SER PORTADA ##---//
         if ($("input[name^=portada-"+$(this).attr('id')+"]:checked").val()==1 && $("input[name^=elimina-imagen-"+$(this).attr('id')+"]:checked").val()==1) {
            alert('Esta imagen ha sido seleccionada para eliminarse, no puede será portada.');
            $("input[name^=portada-"+$(this).attr('id')+"][value=0]").prop('checked', true);
         };        
    });
    
    $('#panel').on('click', '#formulario-edita-propiedad #botones #btn-edita-propiedad', function(e) {
        $('#formulario-edita-propiedad').submit(function(event){
                event.preventDefault();
                $('#formulario-edita-propiedad').validate({
                        onfocusout: false,//deshabilito la validación cuando pierde el foco
                        onkeyup: false,//deshabilito la validación mientras se ingresan los datos
                        rules:
                        {
                          'edita-codigo':
                          {
                            required:true,
                          },
                          'edita-titulo':
                          {
                            required:true,
                          },
                          'edita-propiedad-tipo':
                          {
                            required:true,
                          },                    
                          'edita-pais':
                          {
                            required:true,
                          },
                          'edita-provincia':
                          {
                            required:true,
                          },
                          'edita-partido':
                          {
                            required:true,
                          },
                          'edita-localidad':
                          {
                            required:true,
                          },
                          'edita-calle':
                          {
                            required:true,
                          },
                          'edita-operacion':
                          {
                            required:true,
                          }
                        },
                        messages:
                        {
                          'edita-codigo':
                          {
                            required: function (argument) {                       
                              alert('El campo Código en obligatorio');
                              $('#edita-codigo').focus();                       
                            }
                          },
                          'edita-titulo':
                          {
                            required: function (argument) {                       
                              alert('El campo Título en obligatorio');
                              $('#edita-titulo').focus();
                            }
                          },
                          'edita-propiedad-tipo':
                          {
                            required: function (argument) {                       
                              alert('El campo Tipo de Propiedad en obligatorio');
                              $('#edita-propiedad-tipo').focus();
                            }
                          },                    
                          'edita-pais':
                          {
                            required: function (argument) {                       
                              alert('El campo País en obligatorio');
                              $('#edita-pais').focus();
                            }
                          },
                          'edita-provincia':
                          {
                            required: function (argument) {                       
                              alert('El campo Provincia en obligatorio');
                              $('#edita-provincia').focus();
                            }
                          },
                          'edita-partido':
                          {
                            required: function (argument) {                       
                              alert('El campo Partido en obligatorio');
                              $('#edita-partido').focus();
                            }
                          },
                          'edita-localidad':
                          {
                            required: function (argument) {                       
                              alert('El campo Localidad en obligatorio');
                              $('#edita-localidad').focus();
                            }
                          },
                          'edita-calle':
                          {
                            required: function (argument) {                       
                              alert('El campo Calle en obligatorio');
                              $('#edita-calle').focus();
                            }
                          },
                          'edita-operacion':
                          {
                            required: function (argument) {                       
                              alert('El campo Operación en obligatorio');
                              $('#edita-operacion').focus();
                            }
                          }
                        }
              });//cierra validate
              var valid = $('#formulario-edita-propiedad').valid();
              if (valid==false) {
                event.stopPropagation();
                return false;
              };
              
              var ELIMINAR =[];
              $('input[name^=elimina-imagen-]:checked').each(function(){
                  var imagen = {
                         'imagen'   : $(this).attr('id'),
                         'valor'    : $(this).val()                         
                  }
                  ELIMINAR.push(imagen);                  
              });
              
              var PORTADAS =[];
              $('input[name^=portada-]:checked').each(function(){
                  var portada = {
                         'portada'  : $(this).attr('id'),
                         'valor'    : $(this).val()                         
                  }
                  PORTADAS.push(portada);                  
              });
              var EDITA = {
                      "codigo"               : $('#edita-codigo').val(),
                      "titulo"               : $('#edita-titulo').val(),
                      "propiedadtipo"        : $('#edita-propiedad-tipo').val(),
                      "pais"                 : $('#edita-pais').val(),
                      "provincia"            : $('#edita-provincia').val(),
                      "partido"              : $('#edita-partido').val(),
                      "localidad"            : $('#edita-localidad').val(),
                      "calle"                : $('#edita-calle').val(),
                      "operacion"            : $('#edita-operacion').val(),
                      "numero"               : $('#edita-numero').val(),
                      "plantas"              : $('#edita-plantas').val(),
                      "metroscubiertos"      : $('#edita-metros-cubiertos').val(),
                      "metrostotales"        : $('#edita-metros-totales').val(),
                      "metrossemicubiertos"  : $('#edita-metros-semi-cubiertos').val(),
                      "ambientes"            : $('#edita-ambientes').val(),
                      "banios"               : $('#edita-banios').val(),
                      "piscina"              : $('input[name=edita-piscina]:checked').val(),
                      "solarium"             : $('input[name=edita-solarium]:checked').val(),
                      "gym"                  : $('input[name=edita-gym]:checked').val(),
                      "sum"                  : $('input[name=edita-sum]:checked').val(),
                      "tenis"                : $('input[name=edita-tenis]:checked').val(),
                      "futbol"               : $('input[name=edita-futbol]:checked').val(),
                      "golf"                 : $('input[name=edita-golf]:checked').val(),
                      "seguridad"            : $('input[name=edita-seguridad]:checked').val(),
                      "balcon"               : $('input[name=edita-balcon]:checked').val(),
                      "garage"               : $('input[name=edita-garage]:checked').val(),
                      "aa"                   : $('input[name=edita-aa]:checked').val(),
                      "lavavajillas"         : $('input[name=edita-lavavajillas]:checked').val(),
                      "moneda"               : $('#edita-moneda').val(),
                      "precio"               : $('#edita-precio').val(),
                      "prioridad"            : $('#edita-prioridad').val(),
                      "descripcion"          : $('#edita-descripcion').val(),
                      "eliminar"             : ELIMINAR,
                      "portadas"             : PORTADAS
              }

              $.ajax({
                url: '/propiedades/update',
                type: 'POST',
                dataType: 'json',
                data: {'EDITA': JSON.stringify(EDITA)},
                success: function(data){
                    if (data.success==true) {
                        alert(data.msj);
                         $('#listado-propiedades').trigger('click');
                    }else {
                        alert(data.msj);
                    }
                },
              });                    
              return false;
        });//cierra submit
    
    });

});