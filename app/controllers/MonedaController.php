<?php

class MonedaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /moneda
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$monedas=DB::table('monedas')
				->select('monedas.moneda')
				->get();
			return Response::json(['success' => true,
								   'monedas'  => $monedas 
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /moneda/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /moneda
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /moneda/{id}
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
	 * GET /moneda/{id}/edit
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
	 * PUT /moneda/{id}
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
	 * DELETE /moneda/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}