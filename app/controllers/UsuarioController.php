<?php

class UsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			if (Auth::check()) {
				$usuarios=DB::table('usuarios')
	            	->join('roles', 'usuarios.rol_id', '=', 'roles.id')
	            	->select('usuarios.id as id', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.dni', 'usuarios.email', 'usuarios.username', 'roles.rol')
	            	//->where('usuarios.estado_id', '=', 1)
	            	->get();

	            return (String)View::make('user.listado-usuarios')->with('usuarios', $usuarios);
			}
			
	       
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.user-create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax()){
			$usuario=json_decode(Input::get('USUARIO'));
			$arrayUsuario=(['nombre'	=> $usuario->nombre,
							'apellido'	=> $usuario->apellido,
							'dni'		=> $usuario->dni,
							'email'		=> $usuario->email,
							'username'	=> $usuario->username,
							'password'	=> $usuario->password
							]);
									
			//---##SE VALIDAN LOS DATOS A INGRESAR##---//
			$validacion=Validator::make($arrayUsuario, User::$reglas);
			if ($validacion->fails()){
				return Response::json(array(
			        'success' => false,
			        'msj' 	  => $validacion->getMessageBag()->toArray()
			    ));
			}
			$U = new User;
			$U->nombre=strtoupper($usuario->nombre);
			$U->apellido=strtoupper($usuario->apellido);
			$U->dni=$usuario->dni;
			$U->email=$usuario->email;
			$U->username=$usuario->username;
			$U->password=Hash::make($usuario->password);
			$U->rol_id=1;
			$U->estado_id=1;
			$U->save();

			return Response::json(array(
			        'success' => true,
			        'msj' 	  => 'Ingreso Exitoso'
			));
			
		}
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
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
	 * PUT /user/{id}
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
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function perfil()
	{
		if (Request::ajax()) {
			$perfil=DB::table('usuarios')
	            	->join('roles', 'usuarios.rol_id', '=', 'roles.id')	            	
	            	->where('usuarios.id', '=', Auth::user()->id)
	            	->get();

	        return Response::json(array(
			        'success' => true,
			        'perfil'  => $perfil
			));
		}
	}

	public function panelprincipal()
	{
			$tareas=DB::table('tareas')
			->join('proyectos', 'tareas.proyecto_id', '=', 'proyectos.id')
			->join('estados', 'tareas.estado_id', '=', 'estados.id')
			->select('tareas.id as id', 'tareas.titulo as tarea', 'tareas.descripcion as descripcion',
				'tareas.comienzo as comienzo', 'tareas.limite as limite', 'estados.estado as estado',
				'proyectos.titulo as proyecto')
			//->where('estado_id', '=', 1)
			->where('usuario_id', '=',  Auth::user()->id)
			->orderBy('limite', 'desc')
			->get();
		if (Request::ajax()) {
			return (String)View::make('user.panel-principal')->with('tareas',$tareas);
		}else{
			return View::make('user.panel-principal')->with('tareas',$tareas);
		}
	}


	public function directores()
	{
		if (Request::ajax()) {
			if (Auth::check()) {
				$directores=DB::table('usuarios')
	            	->select('usuarios.id as id', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.rol_id')
	            	->where('usuarios.estado_id', '=', 1)
	            	->where('usuarios.rol_id', '=', 2)
	            	->orderBy('usuarios.apellido', 'asc')
	            	->get();

	            return Response::json(array(
					        'success' 	  => true,
					        'directores' => $directores
				));
			}
			
	       
		}
	}


	public function integrantes()
	{
		if (Request::ajax()) {
			$r=json_decode(Input::get('ROL'));
			$rol=$r->rol;
			if (Auth::check()) {
				$integrantes=DB::table('usuarios')
	            	->select('usuarios.id as id', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.rol_id')
	            	->where('usuarios.estado_id', '=', 1)
	            	->where('usuarios.rol_id', '=', $rol)
	            	->orderBy('usuarios.apellido', 'asc')
	            	->get();

	            return Response::json(array(
					        'success' 	  => true,
					        'integrantes' => $integrantes
				));
			}
			
	       
		}
	}

}