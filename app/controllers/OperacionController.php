<?php

class OperacionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /operacion
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$operaciones=DB::table('operaciones')
				->select('operaciones.operacion', 'operaciones.id')
				->get();
			return Response::json([ 'success'      => true,
									'operaciones'  => $operaciones 
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /operacion/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /operacion
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /operacion/{id}
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
	 * GET /operacion/{id}/edit
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
	 * PUT /operacion/{id}
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
	 * DELETE /operacion/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}