<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/contacto', function()
{
	return View::make('contacto');
});

Route::get('/panel-principal', function()
{
	return View::make('panel.panel-principal');
});

//---## LOGIN ##---//
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

//---## USUARIOS ##---//
Route::resource('/usuarios', 'UsuarioController');

//---## PROPIEDADES ##---//
Route::get('/propiedades/categorias/{categoria}', 'PropiedadController@categorias');
Route::get('/propiedades/operaciones/{operacion}', 'PropiedadController@operaciones');
Route::get('/propiedades/listado', 'PropiedadController@listado');
Route::resource('/propiedades', 'PropiedadController');
Route::post('/propiedades/store', 'PropiedadController@store');
Route::get('/propiedades/{codigo?}/', 'PropiedadController@show');
Route::post('/propiedades/edit', 'PropiedadController@edit');
Route::post('/propiedades/update', 'PropiedadController@update');
Route::post('/propiedades/destroy', 'PropiedadController@destroy');

Route::post('/busqueda-1', 'PropiedadController@busqueda_1');
Route::get('/busqueda/{operacion}/{tipopropiedad}', 'PropiedadController@busqueda');

//---## FILES ##---//
//Route::post('/files/store', 'FileController@store');
Route::post('/files/agregafoto', 'FileController@agregafoto');
Route::resource('/files', 'FileController');
Route::post('/files/store', 'FileController@store');
Route::post('/files/create', 'FileController@create');

//---## TIPO DE PROPIEDADES ##---//
Route::resource('/tipopropiedades', 'TipoPropiedadController');

//---## PAISES ##---//
Route::resource('/paises', 'PaisController');
Route::get('/paises/create', 'PaisController@create');
Route::post('/paises/store', 'PaisController@store');

//---## PROVINCIA ##---//
Route::resource('/provincias', 	 	 'ProvinciaController');
Route::get('/provincias/create',  	 'ProvinciaController@create');
Route::post('/provincias/store', 	 'ProvinciaController@store');
Route::get('/provincias/show/{id}', 'ProvinciaController@show');

//---## PARTIDO ##---//
Route::resource('/partidos', 'PartidoController');
Route::get('/partidos/create', 'PartidoController@create');
Route::post('/partidos/store', 'PartidoController@store');
//---## LOCALIDAD ##---//
Route::resource('/localidades',   'LocalidadController');
Route::get('/localidades/create', 'LocalidadController@create');
Route::post('/localidades/store', 'LocalidadController@store');
//---## OPERACION ##---//
Route::resource('/operaciones', 'OperacionController');

//---## MONEDA ##---//
Route::resource('/monedas', 'MonedaController');

//---## MAILS ##---//
Route::post('/mail/send', 'MailController@send');
Route::resource('/mail/', 'MailController');


Route::post('/validapropiedad', function(){
	$propiedad=Input::get('propiedad');
	$existepropiedad=Mios::validaExistencia('propiedades', 'codigo',  strtoupper('ZB-'.$propiedad));
	if ($existepropiedad==1) {
		return Response::json(['success' => false,
						   	   'msj' 	 => 'El código a ingresar ya se encuentra en la base de datos'
		]);
	}

});




Route::get('/pp', function(){
	File::move(public_path().'/uploads/ZB-1235/Thumbnail/ZB-1235-0.JPG', public_path().'/uploads/ZB-1235/Thumbnail/tempo.JPG');
	//---##PASO 2:  LA IMAGEN ELEGIDA SE PASA A IMAGEN 0##---//
	// File::move(public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->portadas[$i]->portada.'.JPG', public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->codigo.'-'.$j.'.JPG');
	// //---##PASO 3:  LA IMAGEN TEMPORAL SE PASA A IMAGEN ELEGIDA##---//
	// File::move(public_path().'/uploads/'.$edita->codigo.'/Thumbnail/temporal-'.$j.'.JPG', public_path().'/uploads/'.$edita->codigo.'/Thumbnail/'.$edita->portadas[$i]->portada.'.JPG');

								

});
