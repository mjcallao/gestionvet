<?php

class AuthController extends \BaseController {

	// public function showLogin()
 //    {
 //        // Verificamos si hay sesión activa
 //        if (Auth::check())
 //        {
 //            // Si tenemos sesión activa mostrará la página de inicio
 //            return Redirect::to('/');
 //        }
 //        // Si no hay sesión activa mostramos el formulario
 //        return View::make('login');
 //    }
 
    public function postLogin()
    {
        if (Request::ajax()) {

        	// Obtenemos los datos del formulario
	        $data = json_decode(Input::get('datosLoguin'));
	 		$datos = [
	 			'username' => $data->username,
	 			'password' => $data->password
	 		];
	 		

        // Verificamos los datos
	        if (Auth::attempt($datos)) // , Input::get('remember')Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
	        {
	            //---## SE AGREGA EL ROL A LA BARRA DE NAVEGACION ##---//
	            // $rol=DB::table('usuarios')
	            // 	->join('roles', 'usuarios.rol_id', '=', 'roles.id')
	            // 	->select('usuarios.id as id', 'roles.rol as rol', 'roles.nivel as nivel')
	            // 	->where('usuarios.id', '=', Auth::user()->id)
	            // 	->get();
	            // Session::put('rol', $rol[0]->rol);
	            // Session::put('nivel', $rol[0]->nivel);
	            return Response::json(array(
				        'success' => true,
				        'msj' 	  => 'Adentro'
				));
	        }
        // Si los datos no son los correctos volvemos al login y mostramos un error
	        return Response::json(array(
				        'success' => false,
				        'msj' 	  => 'Datos erroneos'
			));
        }
    }
 
    public function logout()
    {
    	Session::flush();
        Auth::logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return View::make('index');
    
        // Limpiamos y Cerramos la sesión
        
    }

}