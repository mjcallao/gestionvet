<?php

class Propiedad extends \Eloquent {
	protected $table = 'propiedades';
	protected $fillable = [];

	public static $reglas=[
						'codigo' => 'required|unique:propiedades',
						
	];
}