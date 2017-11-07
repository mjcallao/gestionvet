<?php

class LocalidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /localidad
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$partido=Input::get('partido');

			$existepartido=Mios::validaExistencia('partidos', 'partido', $partido);
			if ($existepartido==0) {
				return Response::json(['success' => false,
								       'msj'     => 'El Partido es inexistente'
				]);
			}

			// $codpart=DB::table('partidos')
			// 		->where('partido', '=', $partido)
			// 		->get();
			// $codpart = $codpart[0]->codpart;

			$localidades=DB::table('localidades')
				->where('localidades.partido', '=', $partido)
				->select('localidades.localidad')
				->orderBy('localidades.localidad', 'asc')
				->get();
			return Response::json(['success' => true,
								   'localidades'  => $localidades 
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /localidad/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Request::ajax()) {
			return View::make('panel.localidad')->render();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /localidad
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax()) {
			$localidad = json_decode(Input::get('LOCALIDAD'));
			$existepais=Mios::validaExistencia('paises', 'pais', $localidad->pais);
			if ($existepais==0) {
				return Response::json(['success' => false,
								       'msj'  	 => "El país no se enuentra registrado en la base de datos, verifique."
				]);
			}
			$pais_id = Mios::traeId('paises', 'pais', $localidad->pais);
			$pro = DB::table('provincias')
						->where('pais_id', '=', $pais_id)
						->where('provincia', '=', strtoupper($localidad->provincia))
						->get();
			$existeprovincia=count($pro);
			if ($existeprovincia==0) {
				return Response::json(['success' => false,
								       'msj'  	 => "La Provincia no existe en la base de datos."
				]);
			}

			$codprovincia = DB::table('provincias')->where('provincia', '=', strtoupper($localidad->provincia))->get();
			$codprov=$codprovincia[0]->codprov;

			$partido = DB::table('partidos')
						->where('partido', '=', strtoupper($localidad->partido))
						->where('codprov', '=', $codprov)
						->get();
			$loca = DB::table('localidades')
						->where('localidad' , '=', $localidad->localidad)
						->where('partido', '=', $partido[0]->partido)
						->where('codprov', '=', $codprov)
						->get();

			$existelocalidad=count($loca);
			if ($existelocalidad==1) {
				return Response::json(['success' => false,
								       'msj'  	 => "La localidad a ingresar ya se encuentra en la base de datos."
				]);
			}

			$loc = new Localidad;
			$loc->codloc = substr(strtoupper($localidad->localidad), 0, 4);
			$loc->localidad = strtoupper($localidad->localidad);
			$loc->partido = $partido[0]->partido;
			$loc->codprov = $codprov;
			$loc->codpart = substr(strtoupper($partido[0]->partido), 0, 5);
			$loc->save();



			return Response::json(['success' => true,
								   'msj'  	 => "Localidad ingresada con éxito." 
			]);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /localidad/{id}
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
	 * GET /localidad/{id}/edit
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
	 * PUT /localidad/{id}
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
	 * DELETE /localidad/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}