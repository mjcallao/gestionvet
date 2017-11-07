<?php

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /file
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$destacadas = DB::table('propiedades')
					->leftJoin('monedas', 'propiedades.moneda_id', 			      '=', 'monedas.id')
					->leftJoin('operaciones', 'propiedades.operacion_id',   	  '=', 'operaciones.id')
					->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
					//->leftJoin('imagenes', 'propiedades.codigo', 				  '=', 'imagenes.codigo_id')
					//->where('propiedades.prioridad', '=', 10)
					->where('propiedades.estado_id', '=', 1)
					->orderBy('propiedades.prioridad', 'asc')
					->paginate(3);

				

			//return (String)View::make('destacadas')->with(['destacadas' => $destacadas]);
			return Response::json([
									'datos' => (String)View::make('destacadas')->with(['destacadas' => $destacadas]),
									'links' => (String)$destacadas->links()
								  ]);
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /file/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Request::ajax()) {
			$codigo=Input::get('CODIGO');
			return Response::json([
									'success' => true,
									'data'	  => View::make('panel.agregafoto')->with('codigo', $codigo)->render()
			]);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /file
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax())
		{
			$all = Input::all();
			$validar=[
					'codigo' => $all['codigo'],
			];

			$validacion=Validator::make($validar, Propiedad::$reglas);
			if ($validacion->fails()){
				return Response::json(array(
			        'success' => false,
			        'msj' 	  => $validacion->getMessageBag()->toArray()
			    ));
			}
			$path = public_path();
			//$all = Input::all();
			$file = Input::file('file');
			$cant=count($file);
			//$nombre = $file[0]->getClientOriginalName();
			//return Response::json(['codigo' => $all['codigo']]);	
			$existePropiedad=Mios::validaExistencia('propiedades', 'codigo', 'ZB-'.$all['codigo']);
			//return Response::json(['codigo' => $existePropiedad]);	
			if ($existePropiedad==1) {
				return Response::json(['success' => false,
									   'numerror'=> 1,
								   	   'msj' 	 => 'El código a ingresar ya se encuentra en la base de datos'
				]);
			}


			$existetipopropiedad = Mios::validaExistencia('tipopropiedades', 'tipopropiedad', $all['propiedad-tipo']);
			if ($existetipopropiedad==0) {
				return Response::json(['success' => false,
									   'numerror'=> 2,
								   	   'msj' 	 => 'El tipo de propiedad es inexistente.'
				]);
			}
			$tipopropiedad_id = Mios::traeId('tipopropiedades', 'tipopropiedad', $all['propiedad-tipo']);


			

			
			$existeoperacion_id = Mios::validaExistencia('operaciones', 'operacion', $all['operacion']);
			if ($existeoperacion_id==0) {
				return Response::json(['success' => false,
									   'numerror'=> 3,
								   	   'msj' 	 => 'Tipo de operación inexistente.'
				]);
			}
			$operacion_id = Mios::traeId('operaciones', 'operacion', $all['operacion']);



			$existepais_id = Mios::validaExistencia('paises', 'pais', $all['pais']);
			if ($existepais_id==0) {
				return Response::json(['success' => false,
									   'numerror'=> 4,
								   	   'msj' 	 => 'País inexistente.'
				]);
			}
			$pais_id = Mios::traeId('paises', 'pais', $all['pais']);


			$existeprovincia_id = Mios::validaExistencia('provincias', 'provincia', $all['provincia']);
			if ($existeprovincia_id==0) {
				return Response::json([ 'success' => false,
										'numerror'=> 5,
								   	    'msj' 	 => 'Provincia inexistente.'
				]);
			}
			$provincia_id = Mios::traeId('provincias', 'provincia', $all['provincia']);


			$existepartido_id = Mios::validaExistencia('partidos', 'partido', $all['partido']);
			if ($existepartido_id==0) {
				return Response::json([ 'success' => false,
										'numerror'=> 6,
								   	    'msj' 	 => 'Partido inexistente.'
				]);
			}
			$partido_id = Mios::traeId('partidos', 'partido', $all['partido']);



			$existelocalidad_id = Mios::validaExistencia('localidades', 'localidad', $all['localidad']);
			if ($existelocalidad_id==0) {
				return Response::json([ 'success' => false,
										'numerror'=> 7,
								   	    'msj' 	 => 'Localidad inexistente.'
				]);
			}
			$localidad_id = Mios::traeId('localidades', 'localidad', $all['localidad']);



			$existemoneda_id = Mios::validaExistencia('monedas', 'moneda', $all['moneda']);
			if ($existemoneda_id==0) {
				return Response::json([ 'success' => false,
										'numerror'=> 8,
								   	    'msj' 	 => 'Moneda inexistente.'
				]);
			}
			$moneda_id = Mios::traeId('monedas', 'moneda', $all['moneda']);

			if (Input::hasFile('file'))
			{
				
	 			$propiedad = new Propiedad;
	 			$propiedad->codigo           = strtoupper('ZB-'.$all['codigo']);
	 			$propiedad->titulo           = strtoupper($all['titulo']);
	 			$propiedad->tipopropiedad_id = $tipopropiedad_id;
	 			$propiedad->operacion_id     = $operacion_id;
	 			$propiedad->pais_id          = $pais_id;
	 			$propiedad->provincia_id     = $provincia_id;
	 			$propiedad->partido_id       = $partido_id;
	 			$propiedad->localidad_id     = $localidad_id;
	 			$propiedad->calle            = strtoupper($all['calle']);
	 			$propiedad->numero           = $all['numero'];
	 			$propiedad->habitaciones     = $all['ambientes'];
	 			$propiedad->banios           = $all['banios'];
	 			$propiedad->piscina          = $all['piscina'];
	 			$propiedad->solarium         = $all['solarium'];
	 			$propiedad->gimnasio         = $all['gym'];
	 			$propiedad->sum              = $all['sum'];
	 			$propiedad->tenis            = $all['tenis'];
	 			$propiedad->futbol           = $all['futbol'];
	 			$propiedad->golf             = $all['golf'];
	 			$propiedad->seguridad        = $all['seguridad'];
	 			$propiedad->lavavajillas     = $all['lavavajillas'];
	 			$propiedad->balcon           = $all['balcon'];
	 			$propiedad->garage           = $all['garage'];
	 			$propiedad->aa               = $all['aa'];
	 			$propiedad->mtscubiertos     = $all['metros-cubiertos'];
	 			$propiedad->mtstotal         = $all['metros-totales'];
	 			$propiedad->mtssemicubiertos = $all['metros-semi-cubiertos'];	 			
	 			$propiedad->plantas          = $all['plantas'];
	 			$propiedad->moneda_id        = $moneda_id;
	 			$propiedad->valor            = $all['precio'];
	 			$propiedad->prioridad        = $all['prioridad'];
	 			$propiedad->estado_id        = 1;

	 			if ($propiedad->save()) {
	 				$descripcion = new Descripcion;
	 				$codigo_id=DB::table('propiedades')->where('id', '=', $propiedad->id)->get();
	 				$descripcion->codigo_id=$codigo_id[0]->codigo;
	 				$descripcion->descripcion = $all['descripcion'];
	 				$descripcion->save();


	 				File::makeDirectory($path.'/uploads/ZB-'.strtoupper($all['codigo']));
	 				File::makeDirectory($path.'/uploads/ZB-'.strtoupper($all['codigo']).'/Thumbnail');
	 				$ruta=$path.'/uploads/ZB-'.$all['codigo'];
	 				for ($i=0; $i < $cant; $i++) {
	 					$extension = strtoupper($file[$i]->getClientOriginalExtension()); 
	 					if ($extension=='JPEG') {
	 						$extension='JPG';
	 					}
						Image::make($file[$i])->fit(740, 440)->save($path.'/uploads/ZB-'.$all['codigo'].'/'.'ZB-'.$all['codigo'].'-'.$i.'.'.$extension, 80);
						$nombre='ZB-'.$all['codigo'].'-'.$i;
						
						$imagen = new Archivo;
						$imagen->codigo_id  = 'ZB-'.$all['codigo'];
						$imagen->tipo		= 'Principal';
						$imagen->ruta 		= $ruta;
						$imagen->nombre 	= $nombre;
						$imagen->extension 	= $extension;
						$imagen->save();	

	 				}
	 				for ($i=0; $i < $cant; $i++) {
	 					$tipo = $file[$i]->getClientOriginalExtension(); 
						Image::make($file[$i])->fit(370, 220)->save($path.'/uploads/ZB-'.$all['codigo'].'/Thumbnail/'.'ZB-'.$all['codigo'].'-'.$i.'.'.$extension, 80);//--# THUMBLAIS
						$nombre='ZB-'.$all['codigo'].'-'.$i;

						$imagen = new Archivo;
						$imagen->codigo_id  = 'ZB-'.$all['codigo'];
						$imagen->tipo		= 'Thumbnail';
						$imagen->ruta 		= $ruta;
						$imagen->nombre 	= $nombre;
						$imagen->extension 	= $extension;
						$imagen->save();						

	 				}
	 				return Response::json(['success' => true,
								           'msj'     => 'Propiedad ingresada correctamente.'
					]);

	 			}else{
	 				return Response::json(['success' => false,
								           'msj'     => 'Se ha producido un error, vuelva a intentarlo.'
					]);
	 			}
	 			
	 			
				//File::makeDirectory($path.'/uploads/coto', 0777, true, true);
				//Image::make($file[0])->resize(300, 200)->save($path.'/uploads/'.'foo.jpg');
				//$file[0]->move($path.'/uploads', 'NUEVA-'.$nombre);
			   	
			}
			
		}
			
			
		
	}

	/**
	 * Display the specified resource.
	 * GET /file/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /file/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /file/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /file/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function agregafoto()
	{
		if (Request::ajax()) {
			$codigo = Input::get('codigo');
			$cantidaddefotos = DB::table('imagenes')
							->where('codigo_id', '=', $codigo)
							->where('tipo', '=', 'principal')
							->get();
			$cantidad = count($cantidaddefotos);

			
			$file = Input::file('file');
			$cant=count($file);
			$path = public_path();
			$ruta=$path.'/uploads/'.$codigo;
			// return Response::json([
			// 						'success' => true,
			// 						'nombre'	  => $nombre,
			// 						'cadena'	=> $codigo.'-'.$cantidad
			// 	]);
			for ($i=0; $i < $cant; $i++) {
				$extension = strtoupper($file[$i]->getClientOriginalExtension()); 
				if ($extension=='JPEG') {
					$extension='JPG';
				}
				$numero=$cantidad+$i;
				Image::make($file[$i])->fit(740, 440)->save($path.'/uploads/'.$codigo.'/'.$codigo.'-'.$numero.'.'.$extension, 80);
				$nombre=$codigo.'-'.$numero;
				
				$imagen = new Archivo;
				$imagen->codigo_id  = $codigo;
				$imagen->tipo		= 'Principal';
				$imagen->ruta 		= $ruta;
				$imagen->nombre 	= $nombre;
				$imagen->extension 	= $extension;
				$imagen->save();	

			}
			for ($i=0; $i < $cant; $i++) {
				$numero=$cantidad+$i;
				$tipo = $file[$i]->getClientOriginalExtension(); 
				Image::make($file[$i])->fit(370, 220)->save($path.'/uploads/'.$codigo.'/Thumbnail/'.$codigo.'-'.$numero.'.'.$extension, 80);//--# THUMBLAIS
				//$nombre='ZB-'.$codigo.'-'.$cantidad+$i;

				$imagen = new Archivo;
				$imagen->codigo_id  = $codigo;
				$imagen->tipo		= 'Thumbnail';
				$imagen->ruta 		= $ruta;
				$imagen->nombre 	= $nombre;
				$imagen->extension 	= $extension;
				$imagen->save();						

			}

			return Response::json([
									'success' => true,
									'data'	  =>'llegamos!'
			]);

		}
	}

}