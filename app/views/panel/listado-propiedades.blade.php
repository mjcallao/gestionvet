<br>
<p class="mi-subtitulo text-center">Listado de Propiedades</p>

<table id="tabla-propiedades" class="display" cellspacing="0" width="50%">
      <thead>
          <tr class="small">
            <th>Código</th>
            <th>Título</th>
            <th>Propiedad</th>
            <th>Operación</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Partido</th>
            <th>Localidad</th>
            <th>Domicilio</th>
            <th>Mts. Cub.</th>
            <th>Mts. Total</th>
            <th>Plantas</th>
            <th>Moneda</th>
            <th>Precio</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>+ Foto</th>
            <th>Eliminar</th>
          </tr>
      </thead>
      @if($propiedades)
      <tbody>
        @foreach($propiedades as $propiedad)
          <tr class="small">
            <td  style="color:red">{{$propiedad->codigo}}</td>
            <td style="color:#1C1C1B">{{$propiedad->titulo}}</td>
            <td style="color:#1C1C1B">{{$propiedad->tipopropiedad}}</td>
            <td style="color:#1C1C1B">{{$propiedad->operacion}}</td>
            <td style="color:#1C1C1B">{{$propiedad->pais}}</td>
            <td style="color:#1C1C1B">{{$propiedad->provincia}}</td>
            <td style="color:#1C1C1B">{{$propiedad->partido}}</td>
            <td style="color:#1C1C1B">{{$propiedad->localidad}}</td>
            <td style="color:#1C1C1B">{{$propiedad->calle .' '. $propiedad->numero}}</td>
            <td style="color:#1C1C1B">{{$propiedad->mtscubiertos}}</td>
            <td style="color:#1C1C1B">{{$propiedad->mtstotal}}</td>
            <td style="color:#1C1C1B">{{$propiedad->plantas}}</td>
            <td style="color:#1C1C1B">{{$propiedad->codmoneda}}</td>
            <td style="color:#1C1C1B">{{$propiedad->valor}}</td>
            <td style="color:#1C1C1B">{{$propiedad->prioridad}}</td>
            <td style="color:#1C1C1B">{{$propiedad->estado}}</td>
            <td class="text-center">
                <div class="mi-btn btn" id={{ "edita-".$propiedad->codigo }} >
                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                </div>
            </td>
             <td class="text-center">
                <div class="mi-btn btn" id={{ "foto-".$propiedad->codigo }} >
                    <i class="fa fa-camera fa-2x" aria-hidden="true"></i>
                </div>
            </td>
            <td class="text-center">
                <div id={{ "elimina-".$propiedad->codigo }} class="mi-btn btn text-danger">
                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                </div>
            </td>
          </tr> 
        @endforeach
      </tbody>
	 @endif
</table>
