<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('nombre', 'apellido', 'dni', 'email', 'username');
	protected $hidden = array('password', 'remember_token');

	public static $reglas = [
								'nombre'	=> 'required|min:4|max:15',
								'apellido'	=> 'required|min:3|max:15',
								'dni'		=> 'required|min:7|max:8|unique:usuarios',
								'email'		=> 'required|email|min:7|max:45|unique:usuarios',
								'username'	=> 'required|unique:usuarios',
								'password'	=> 'required'
					];


}
