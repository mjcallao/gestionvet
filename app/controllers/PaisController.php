<?php

class PaisController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pais
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$paises=DB::table('paises')
				->orderBy('pais', 'asc')
				->get();
			return Response::json(['success' => true,
								   'paises'  => $paises 
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pais/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Request::ajax()) {
			return View::make('panel.pais')->render();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pais
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax()) {
			$pais = json_decode(Input::get('PAIS'));
			$existepais=Mios::validaExistencia('paises', 'pais', $pais->pais);
			if ($existepais==1) {
				return Response::json(['success' => false,
								       'msj'  	 => "El país ya se enuentra registrado en la base de datos."
				]);
			}

			$p = new Pais;
			$p->pais = strtoupper($pais->pais);
			$p->save();

			return Response::json(['success' => true,
								   'msj'  	 => "País ingresado con éxito." 
			]);

		}

			
	}

	/**
	 * Display the specified resource.
	 * GET /pais/{id}
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
	 * GET /pais/{id}/edit
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
	 * PUT /pais/{id}
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
	 * DELETE /pais/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}