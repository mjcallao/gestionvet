$(document).on('ready', function() 
{
	map = new GMaps({
        scrollwheel: false,
        el: '#map',
        lat: -12.043333,
        lng: -77.028333
    });
          var calle = $('#calle').text();
          var numero = $('#numero').text();
          var localidad = $('#localidad').text();   
          var provincia = $('#provincia').text();
          var pais = $('#pais').text();
          //alert(calle+ ' ' +numero+ ', ' +localidad +', '+ provincia +', '+ pais);
	GMaps.geocode({
          
          //address:'Sangento Cabral 1954, Canning, Buenos Aires, Argentina',
          address: calle+ ' ' +numero+ ', ' +localidad +', '+ provincia +', '+ pais,
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng()
              });

            }
          }
    });

    

});