<?php

class PartidoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /partido
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$provincia=Input::get('provincia');

			$existeprovincia=Mios::validaExistencia('provincias', 'provincia', $provincia);
			if ($existeprovincia==0) {
				return Response::json(['success' => false,
								       'msj'     => $existeprovincia
				]);
			}

			$codprov=DB::table('provincias')
					->where('provincia', '=', $provincia)
					->get();
			$codprov = $codprov[0]->codprov;

			$partidos=DB::table('partidos')
				->where('partidos.codprov', '=', $codprov)
				->select('partidos.partido')
				->orderBy('partidos.partido', 'asc')
				->get();
			return Response::json(['success' => true,
								   'partidos'  => $partidos 
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /partido/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Request::ajax()) {
			return View::make('panel.partido')->render();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /partido
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax()) {
			$partido = json_decode(Input::get('PARTIDO'));
			$existepais=Mios::validaExistencia('paises', 'pais', $partido->pais);
			if ($existepais==0) {
				return Response::json(['success' => false,
								       'msj'  	 => "El país no se enuentra registrado en la base de datos, verifique."
				]);
			}
			$pais_id = Mios::traeId('paises', 'pais', $partido->pais);
			$pro = DB::table('provincias')
						->where('pais_id', '=', $pais_id)
						->where('provincia', '=', strtoupper($partido->provincia))
						->get();
			$existeprovincia=count($pro);
			if ($existeprovincia==0) {
				return Response::json(['success' => false,
								       'msj'  	 => "La Provincia no existe en la base de datos."
				]);
			}

			$codprovincia = DB::table('provincias')->where('provincia', '=', strtoupper($partido->provincia))->get();
			$codprov=$codprovincia[0]->codprov;

			$part = DB::table('partidos')
						->where('partido', '=', strtoupper($partido->partido))
						->where('codprov', '=', $codprov)
						->get();
			$existepartido=count($part);
			if ($existepartido==1) {
				return Response::json(['success' => false,
								       'msj'  	 => "El Partido a ingresar ya se encuentra en la base de datos."
				]);
			}

			$p = new Partido;
			$p->codpart = substr(strtoupper($partido->partido), 0, 4);
			$p->partido = strtoupper($partido->partido);
			$p->codprov = $codprov;
			$p->save();


			return Response::json(['success' => true,
								   'msj'  	 => "Partido ingresado con éxito." 
			]);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /partido/{id}
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
	 * GET /partido/{id}/edit
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
	 * PUT /partido/{id}
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
	 * DELETE /partido/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}