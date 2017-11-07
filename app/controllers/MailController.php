<?php

class MailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /mail
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mail/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mail
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /mail/{id}
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
	 * GET /mail/{id}/edit
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
	 * PUT /mail/{id}
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
	 * DELETE /mail/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function send()
	{
		if (Request::ajax())
		{
			$mail = json_decode(Input::get('MENSAJE'), true);
			// try {
				Mail::send('emails.contacto', ['mail'=>$mail], function($mensaje) use ($mail)
				{
				   $mensaje->from($mail['email'], $mail['nombre']);	 
		           //asunto
		         
		           $mensaje->subject($mail['asunto']. ' - ' .$mail['nombre']);
		          
		           //receptor
		           $mensaje->to('diego.barrueta@gmail.com');
				});

				return Response::json([
										'success' => true,
										'msj'	  => 'Mensaje enviado correctamente.'
				]);
			// } catch (Exception $e) {
			// 	return Response::json([
			// 							'success' => false,
			// 							'msj'	  => 'Ha ocurrido un error, vuelva a intentarlo.'
			// 	]);
			// }
			
		}
	}
		


}