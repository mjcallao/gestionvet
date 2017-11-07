<?php

class Pais extends \Eloquent {
	protected $table = 'paises';
	protected $fillable = [];

	public static $reglas=[
						'pais' => 'required|unique:paises',
						
	];
}