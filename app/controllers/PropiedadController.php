<?php
class PropiedadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /propiedad
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$propiedades = DB::table('propiedades')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('provincias', 'propiedades.provincia_id', '=', 'provincias.id')
				->leftJoin('paises', 'propiedades.pais_id', '=', 'paises.id')
				->leftJoin('descripciones', 'propiedades.codigo', '=', 'descripciones.codigo_id')
				->leftJoin('estados', 'propiedades.estado_id', '=', 'estados.id')
				->get();
			return (String)View::make('panel.listado-propiedades')->with('propiedades', $propiedades)->render();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /propiedad/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /propiedad
	 *
	 * @return Response
	 */
	public function store()
	{
	
	}

	/**
	 * Display the specified resource.
	 * GET /propiedad/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($codigo)
	{

		$propiedad = DB::table('propiedades')
				->leftJoin('imagenes', 	'propiedades.codigo', '=', 'imagenes.codigo_id')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('provincias', 'propiedades.provincia_id', '=', 'provincias.id')
				->leftJoin('paises', 'propiedades.pais_id', '=', 'paises.id')
				->leftJoin('descripciones', 'propiedades.codigo', '=', 'descripciones.codigo_id')
				->where('propiedades.codigo', '=', $codigo)
				->get();

		$imagenes = DB::table('imagenes')
				->where('codigo_id', '=', $codigo)
				->where('tipo', '=', 'Thumbnail')
				->get();

		$recomendadas =  DB::table('propiedades')
								->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
								->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
								->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
								->where('propiedades.estado_id', '=', 1)
								->orderBy(DB::raw('RAND()'))->take(4)->get();
								// ->whereIn('propiedades.prioridad', [1,2,3,4,5,6,7,8,9,10])
								// ->limit(4)
								// ->get();

		$visita = new Visita;
		$visita->codigo_id=$codigo;
		$visita->save();


		return View::make('detalle')->with(['propiedad'    => $propiedad,
											'imagenes'	   => $imagenes,
											'recomendadas' => $recomendadas
		]);
		

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /propiedad/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		if (Request::ajax()) {
			$codigo=(Input::get('CODIGO'));			
			$propiedad = DB::table('propiedades')
				//->leftJoin('imagenes', 	'propiedades.codigo', '=', 'imagenes.codigo_id')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('provincias', 'propiedades.provincia_id', '=', 'provincias.id')
				->leftJoin('paises', 'propiedades.pais_id', '=', 'paises.id')
				->leftJoin('descripciones', 'propiedades.codigo', '=', 'descripciones.codigo_id')
				->where('propiedades.codigo', '=', $codigo)
				->get();

			$imagenes = DB::table('imagenes')
					->where('codigo_id', '=', $codigo)
					->where('tipo', '=', 'Thumbnail')
					->orderBy('nombre', 'asc')
					->get();

			return Response::json([
									'success' => true,
									'data'	  => View::make('panel.edita-propiedad')->with(['propiedad' => $propiedad, 
																							'imagenes'  => $imagenes])->render()
			]);

		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /propiedad/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		if (Request::ajax()) {
			$edita = json_decode(Input::get('EDITA'));
			$existePropiedad=Mios::validaExistencia('propiedades', 'codigo', $edita->codigo);
			//return Response::json(['codigo' => $existePropiedad]);	
			if ($existePropiedad==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'Esta propiedad no se encuentra en la Base de datos.'
				]);
			}

			$tipopropiedad_id = Mios::traeId('tipopropiedades', 'tipopropiedad', $edita->propiedadtipo);
			if ($tipopropiedad_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'Esta propiedad no se encuentra en la Base de datos.'
				]);
			}
			
			$operacion_id = Mios::traeId('operaciones', 'operacion', $edita->operacion);
			if ($operacion_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'Esta operación no se encuentra en la Base de datos.'
				]);
			}

			$pais_id = Mios::traeId('paises', 'pais', $edita->pais);
			if ($pais_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'El país no se encuentra en la Base de datos.'
				]);
			}

			$provincia_id = Mios::traeId('provincias', 'provincia', $edita->provincia);
			if ($provincia_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'La provincia no se encuentra en la Base de datos.'
				]);
			}

			$partido_id = Mios::traeId('partidos', 'partido', $edita->partido);
			if ($partido_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'El partido no se encuentra en la Base de datos.'
				]);
			}

			$localidad_id = Mios::traeId('localidades', 'localidad', $edita->localidad);
			if ($localidad_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'La localidad no se encuentra en la Base de datos.'
				]);
			}

			$moneda_id = Mios::traeId('monedas', 'moneda', $edita->moneda);
			if ($moneda_id==0) {
				return Response::json(['success' => false,
								   	   'msj' 	 => 'El tipo de moneda no se encuentra en la Base de datos.'
				]);
			}

			DB::beginTransaction();
				try {
					$actualiza = DB::table('propiedades')
							->where('codigo', '=', $edita->codigo)
							->update(['titulo'           => $edita->titulo,
									  'tipopropiedad_id' => $tipopropiedad_id,
									  'operacion_id'	 => $operacion_id,
									  'pais_id'	         => $pais_id,
									  'provincia_id'     => $provincia_id,
									  'partido_id'       => $partido_id,
									  'localidad_id'     => $localidad_id,
									  'calle'	         => $edita->calle,
									  'numero'	         => $edita->numero,
									  'habitaciones'     => $edita->ambientes,
									  'banios'	         => $edita->banios,
									  'piscina'          => $edita->piscina,
									  'solarium'         => $edita->solarium,
									  'gimnasio'         => $edita->gym,
									  'sum'              => $edita->sum,
									  'tenis'            => $edita->tenis,
									  'futbol'           => $edita->futbol,
									  'golf'             => $edita->golf,
									  'seguridad'        => $edita->seguridad,
									  'lavavajillas'     => $edita->lavavajillas,
									  'balcon'           => $edita->balcon,
									  'garage'           => $edita->garage,
									  'aa'               => $edita->aa,
									  'mtscubiertos'     => $edita->metroscubiertos,
									  'mtstotal'	     => $edita->metrostotales,
									  'mtssemicubiertos' => $edita->metrossemicubiertos,
									  'plantas'          => $edita->plantas,
									  'moneda_id'        => $moneda_id,
									  'valor'            => $edita->precio,
									  'prioridad'        => $edita->prioridad,
							]);
					if (count($edita->eliminar)>0) {
						for ($i=0; $i < count($edita->eliminar); $i++) { 
							if ($edita->eliminar[$i]->valor==1) {
								//---## ELIMINA LA IMAGEN DE LA BASE DE DATOS ##---//
								DB::table('imagenes')
										->where('nombre', '=', $edita->eliminar[$i]->imagen)->delete();
								//---## ELIMINA LA IMAGEN EN EL DISCO ##---//
								File::delete(public_path().'/uploads/'.$edita->codigo.'/'.$edita->eliminar[$i]->imagen.'.JPG');
								File::delete(public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->eliminar[$i]->imagen.'.JPG');
							}//cierra if
						}//cierra for
					}//cierra if

					//---###ACTUALIZA LAS PORTADAS SI EL USUARIO LAS QUIERE MODIFICAR##---//
					if (count($edita->portadas)>0) {
						$j = 0; 
						for ($i=0; $i < count($edita->portadas) ; $i++) {							
							if ($edita->portadas[$i]->valor==1) {
								//---##PRIMERO MODIFICO LAS PEQUEÑAS EN EL DIRECTORIO THUMBNAIL##---//
								//---##PASO 1:  LA IMAGEN  0 SE PASA A TEMPORAL##---//								
								File::move(public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->codigo.'-'.$j.'.JPG', public_path().'/uploads/'.$edita->codigo.'/Thumbnail/temporal-'.$j.'.JPG');
								//---##PASO 2:  LA IMAGEN ELEGIDA SE PASA A IMAGEN 0##---//
								File::move(public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->portadas[$i]->portada.'.JPG', public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->codigo.'-'.$j.'.JPG');
								//---##PASO 3:  LA IMAGEN TEMPORAL SE PASA A IMAGEN ELEGIDA##---//
								File::move(public_path().'/uploads/'.$edita->codigo.'/Thumbnail/temporal-'.$j.'.JPG', public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->portadas[$i]->portada.'.JPG');

								//---##LUEGO MODIFICO LAS DEL DIRECTORIO DONDE ESTAN LAS IMAGENES GRANDES##---//
								File::move(public_path().'/uploads/'.$edita->codigo.'/'.$edita->codigo.'-'.$j.'.JPG', public_path().'/uploads/'.$edita->codigo.'/temporal-'.$j.'.JPG');
								//---##PASO 2:  LA IMAGEN ELEGIDA SE PASA A IMAGEN 0##---//
								File::move(public_path().'/uploads/'.$edita->codigo.'/'.$edita->portadas[$i]->portada.'.JPG', public_path().'/uploads/'.$edita->codigo.'/'.$edita->codigo.'-'.$j.'.JPG');
								//---##PASO 3:  LA IMAGEN TEMPORAL SE PASA A IMAGEN ELEGIDA##---//
								File::move(public_path().'/uploads/'.$edita->codigo.'/temporal-'.$j.'.JPG', public_path().'/uploads/'.$edita->codigo.'/'.$edita->portadas[$i]->portada.'.JPG');

								//---## EDITO LOS NOMBRES EN LA BASE DE DATOS ##---//
								$actualiza = DB::table('imagenes')
												->where('nombre', '=', $edita->codigo.'-'.$j)
												->update(['nombre' =>  'temporal-'.$j
												]);

								$actualiza = DB::table('imagenes')
												->where('nombre', '=', $edita->portadas[$i]->portada)
												->update(['nombre' =>  $edita->codigo.'-'.$j,														
												]);

								$actualiza = DB::table('imagenes')
												->where('nombre', '=', 'temporal-'.$j)
												->update(['nombre' =>  $edita->portadas[$i]->portada,														
												]);
								$j = $j + 1;
							}

						}
					}
					
				} catch (Exception $e) {
					DB::rollBack();
					return Response::json([
											'success' => false,
											'msj'	  => 'Se ha producido un error: '.$e->getMessage()			
					]);

				}
			DB::commit();
			return Response::json([
									'success' => true,
									'msj'	  => 'Propiedad actualizada con éxito.'			
			]);

			
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /propiedad/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$propiedad = (Input::get('CODIGO'));

		try {
			File::deleteDirectory(public_path().'/uploads/'.$propiedad);
			
			DB::beginTransaction();
				DB::table('imagenes')
					->where('codigo_id', '=', $propiedad)
					->delete();
				DB::table('descripciones')
						->where('codigo_id', '=', $propiedad)
						->delete();
				DB::table('propiedades')
						->where('codigo',    '=', $propiedad)
						->delete();
				DB::table('visitas')
						->where('codigo_id', '=', $propiedad)
						->delete();


		} catch (Exception $e) {
			DB::rollBack();
					return Response::json([
											'success' => false,
											'msj'	  => 'Se ha producido un error: '.$e->getMessage()			
					]);
		}
			DB::commit();
					return Response::json([
											'success' => true,
											'msj'	  => 'Propiedad eliminada con éxito.'			
					]);
		

	}

	public function busqueda_1()
	{
		if (Request::ajax()) {
			$codigo=json_decode(Input::get('busqueda'));
			if (!empty($codigo->codigo)) {
				$existe=Mios::validaExistencia('propiedades', 'codigo', strtoupper($codigo->codigo));
				if ($existe==0) {
					return Response::json([
									'success' => 'error',
									'msj'     => 'Código inexistente, verifique los datos ingresados.'
				    ]);
				}
				return Response::json([
									'success' => 'codigo',
									'codigo'  => strtoupper($codigo->codigo)
				]);
			}else{
				$propiedades = DB::table('propiedades')
						//->leftJoin('imagenes', 'propiedades.codigo', '=', 'imagenes.codigo_id')
						->leftJoin('monedas', 'propiedades.moneda_id', '=', 'monedas.id')
						->leftJoin('operaciones', 'propiedades.operacion_id', '=', 'operaciones.id')
						->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
						->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
						->where('propiedades.estado_id', '=', 1);

						if ($codigo->operacion!=4){
							$propiedades=$propiedades->where('propiedades.operacion_id', '=', $codigo->operacion);
						}else{
							$propiedades=$propiedades->whereIn('propiedades.operacion_id', [1,2,3,4]);
						}

						if ($codigo->tipopropiedad!=38){
							$propiedades=$propiedades->where('propiedades.tipopropiedad_id', '=',$codigo->tipopropiedad);
						}else{
							$propiedades=$propiedades->whereIn('propiedades.tipopropiedad_id', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]);
						}
						
						$propiedades=$propiedades->orderBy('propiedades.prioridad', '=', 'desc')
						->paginate(8);
				
				if (count($propiedades)==0) {
					return Response::json([
											'success' => 'error',
											'msj'     => 'No existen registros de la búsqueda seleccionada.'
					]);
				}else{
					return Response::json([
						                'success'     		=> 'busqueda',
										'operacion_id' 		=> $codigo->operacion,
										'tipopropiedad_id'  => $codigo->tipopropiedad
					]);
				}
			}

		}
	}

	public function busqueda($operacion, $tipopropiedad)
	{


		$propiedades = DB::table('propiedades')
			//->leftJoin('imagenes', 'propiedades.codigo', '=', 'imagenes.codigo_id')
			->leftJoin('monedas', 'propiedades.moneda_id', '=', 'monedas.id')
			->leftJoin('operaciones', 'propiedades.operacion_id', '=', 'operaciones.id')
			->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
			->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
			->where('propiedades.estado_id', '=', 1);

			if ($codigo->operacion!=4){
				$propiedades=$propiedades->where('propiedades.operacion_id', '=', $operacion);
			}else{
				$propiedades=$propiedades->whereIn('propiedades.operacion_id', [1,2,3,4]);
			}

			if ($codigo->tipopropiedad!=38){
				$propiedades=$propiedades->where('propiedades.tipopropiedad_id', '=',$tipopropiedad);
			}else{
				$propiedades=$propiedades->whereIn('propiedades.tipopropiedad_id', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]);
			}
			
			$propiedades=$propiedades->orderBy('propiedades.prioridad', '=', 'desc')
			->paginate(8);

		$operaciones = DB::table('propiedades')
				->leftJoin('operaciones', 'propiedades.operacion_id', '=', 'operaciones.id')
                ->select('operaciones.id as id', 'operaciones.operacion as operacion', DB::raw('count(operaciones.operacion) as total'))
                ->groupBy('operaciones.operacion')
                ->get();			

        $categorias = DB::table('propiedades')
            	->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
                ->select('tipopropiedades.id as id', 'tipopropiedades.tipopropiedad as tipopropiedad', DB::raw('count(tipopropiedades.tipopropiedad) as total'))
                ->groupBy('tipopropiedades.tipopropiedad')
                ->get();	

		$recomendadas =  DB::table('propiedades')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->where('propiedades.estado_id', '=', 1)
				->orderBy(DB::raw('RAND()'))->take(4)->get();
		//return count($propiedades);
		

		return View::make('resultado')->with(['propiedades'  => $propiedades,
											  'operaciones'  => $operaciones,
											  'categorias'   => $categorias,
											  'recomendadas' => $recomendadas
		]);
	}




	public function listado()
	{
		
			$propiedades = DB::table('propiedades')
				//->leftJoin('imagenes', 	'propiedades.codigo', '=', 'imagenes.codigo_id')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('provincias', 'propiedades.provincia_id', '=', 'provincias.id')
				->leftJoin('paises', 'propiedades.pais_id', '=', 'paises.id')
				->leftJoin('descripciones', 'propiedades.codigo', '=', 'descripciones.codigo_id')
				->where('propiedades.estado_id', '=', 1)
				->paginate(8);

		//$prioridad = rand(1,10);
		//return $prioridad;
				
			$operaciones = DB::table('propiedades')
				->leftJoin('operaciones', 'propiedades.operacion_id', '=', 'operaciones.id')
                ->select('operaciones.id as id', 'operaciones.operacion as operacion', DB::raw('count(operaciones.operacion) as total'))
                ->groupBy('operaciones.operacion')
                ->get();			

            $categorias = DB::table('propiedades')
            	->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
                ->select('tipopropiedades.id as id', 'tipopropiedades.tipopropiedad as tipopropiedad', DB::raw('count(tipopropiedades.tipopropiedad) as total'))
                ->groupBy('tipopropiedades.tipopropiedad')
                ->get();	
			
			$recomendadas =  DB::table('propiedades')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->where('propiedades.estado_id', '=', 1)
				->orderBy(DB::raw('RAND()'))->take(4)->get();



			return View::make('listado')->with(['propiedades'  => $propiedades,
												'operaciones'  => $operaciones,
												'categorias'   => $categorias,
												'recomendadas' => $recomendadas
			]);
	
		
	}


	public function categorias($categoria)
	{

		$propiedades = DB::table('propiedades')
				//->leftJoin('imagenes', 	'propiedades.codigo', '=', 'imagenes.codigo_id')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('provincias', 'propiedades.provincia_id', '=', 'provincias.id')
				->leftJoin('paises', 'propiedades.pais_id', '=', 'paises.id')
				->leftJoin('descripciones', 'propiedades.codigo', '=', 'descripciones.codigo_id')
				->where('propiedades.estado_id', '=', 1)
				->where('propiedades.tipopropiedad_id', '=', $categoria)
				->paginate(8);

		//$prioridad = rand(1,10);
		//return $prioridad;
				
		$operaciones = DB::table('propiedades')
				->leftJoin('operaciones', 'propiedades.operacion_id', '=', 'operaciones.id')
                ->select('operaciones.id as id', 'operaciones.operacion as operacion', DB::raw('count(operaciones.operacion) as total'))
                ->groupBy('operaciones.operacion')
                ->get();			

        $categorias = DB::table('propiedades')
            	->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
                ->select('tipopropiedades.id as id', 'tipopropiedades.tipopropiedad as tipopropiedad', DB::raw('count(tipopropiedades.tipopropiedad) as total'))
                ->groupBy('tipopropiedades.tipopropiedad')
                ->get();	
			
		$recomendadas =  DB::table('propiedades')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->where('propiedades.estado_id', '=', 1)
				->orderBy(DB::raw('RAND()'))->take(4)->get();



		return View::make('resultado')->with(['propiedades'  => $propiedades,
											  'operaciones'  => $operaciones,
											  'categorias'   => $categorias,
											  'recomendadas' => $recomendadas
		]);
	}




	public function operaciones($operacion)
	{

		$propiedades = DB::table('propiedades')
				//->leftJoin('imagenes', 	'propiedades.codigo', '=', 'imagenes.codigo_id')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('provincias', 'propiedades.provincia_id', '=', 'provincias.id')
				->leftJoin('paises', 'propiedades.pais_id', '=', 'paises.id')
				->leftJoin('descripciones', 'propiedades.codigo', '=', 'descripciones.codigo_id')
				->where('propiedades.estado_id', '=', 1)
				->where('propiedades.operacion_id', '=', $operacion)
				->paginate(8);

		//$prioridad = rand(1,10);
		//return $prioridad;
				
		$operaciones = DB::table('propiedades')
				->leftJoin('operaciones', 'propiedades.operacion_id', '=', 'operaciones.id')
                ->select('operaciones.id as id', 'operaciones.operacion as operacion', DB::raw('count(operaciones.operacion) as total'))
                ->groupBy('operaciones.operacion')
                ->get();			

        $categorias = DB::table('propiedades')
            	->leftJoin('tipopropiedades', 'propiedades.tipopropiedad_id', '=', 'tipopropiedades.id')
                ->select('tipopropiedades.id as id', 'tipopropiedades.tipopropiedad as tipopropiedad', DB::raw('count(tipopropiedades.tipopropiedad) as total'))
                ->groupBy('tipopropiedades.tipopropiedad')
                ->get();	
			
		$recomendadas =  DB::table('propiedades')
				->leftJoin('monedas', 	'propiedades.moneda_id', '=', 'monedas.id')
				->leftJoin('localidades', 'propiedades.localidad_id', '=', 'localidades.id')
				->leftJoin('operaciones', 	'propiedades.operacion_id', '=', 'operaciones.id')
				->where('propiedades.estado_id', '=', 1)
				->orderBy(DB::raw('RAND()'))->take(4)->get();



		return View::make('resultado')->with(['propiedades'  => $propiedades,
											  'operaciones'  => $operaciones,
											  'categorias'   => $categorias,
											  'recomendadas' => $recomendadas
		]);
	}

}