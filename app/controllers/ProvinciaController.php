<?php

class ProvinciaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /provincia
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$pais=Input::get('pais');
			$pais_id=Mios::traeId('paises', 'pais', $pais);
			
			$provincias=DB::table('provincias')
				->where('provincias.pais_id', '=', $pais_id)
				->select('provincias.provincia')
				->orderBy('provincia', 'asc')
				->get();
			return Response::json(['success' => true,
								   'provincias'  => $provincias 
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /provincia/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Request::ajax()) {
			return View::make('panel.provincia')->render();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /provincia
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax()) {
			$provincia = json_decode(Input::get('PROVINCIA'));
			$existepais=Mios::validaExistencia('paises', 'pais', $provincia->pais);
			if ($existepais==0) {
				return Response::json(['success' => false,
								       'msj'  	 => "El país no se enuentra registrado en la base de datos, verifique."
				]);
			}

			$pais_id = Mios::traeId('paises', 'pais', $provincia->pais);

			$pro = DB::table('provincias')
						->where('pais_id', '=', $pais_id)
						->where('provincia', '=', strtoupper($provincia->provincia))
						->get();
			$existeprovincia=count($pro);
			if ($existeprovincia==1) {
				return Response::json(['success' => false,
								       'msj'  	 => "La Provincia a ingresar ya se encuentra en la base de datos."
				]);
			}

			$provi = new Provincia;
			$provi->codprov = substr(strtoupper($provincia->provincia), 0, 3);
			$provi->provincia =  strtoupper($provincia->provincia);
			$provi->pais_id = $pais_id;
			$provi->save();


			return Response::json(['success' => true,
								   'msj'  	 => "Provincia ingresada con éxito." 
			]);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /provincia/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'Bien, vas mejorando, '.$id;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /provincia/{id}/edit
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
	 * PUT /provincia/{id}
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
	 * DELETE /provincia/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}