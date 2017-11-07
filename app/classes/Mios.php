<?php 
	/**
	* 
	*/
	class Mios 
	{

		
		//---############################################################---//
		//---### DEVUELVE EL ID DE UNA TABLA, CAULQUIERA SEA#############---//
		//---### $TABLA ES LA TABLA A CONSULTAR #########################---//
		//---### $CAMPO ES EL CAMPO A CONSULTAR #########################---//
		//---### $PARAMETRO ES EL PARAMETRO DEL CUAL VA A TRAER EL ID ###---//
		//---############################################################---// 
		public static function traeId($tabla, $campo, $parametro)
		{
			$table=DB::table($tabla)
					->where($campo, '=', $parametro)
					->get();
			if (count($table)==0) {
				return  0;
			}
			return $table[0]->id;
		}

		//---############################################################---//
		//---### CAMBIA EL ESTADO DE UN OBJETO QUE TENGA ESTADO #########---//
		//---### $TABLA ES LA TABLA A ACTUALIZAR ########################---//
		//---### $id SELECCIONA EL REGISTRO A ACTUALIZAR ################---//
		//---# $estadoNuevo ES EL NUEVA ESTADO QUE VA A TENER ESE OBJETO ---//
		//---############################################################---// 
		public static function cambiaEstado($tabla, $id, $estadoNuevo)
		{
			$cambiaEstado=DB::table($tabla)
					->where('id', '=', $id)
					->update(array('estado_id' => $estadoNuevo));
		}



		public static function validaExistencia($tabla, $campo, $parametro)
		{
			$existe=DB::table($tabla)
					->where($campo, '=', $parametro)
					->count();
		
			if ($existe>0) {
				return 1;
			}
			return 0;
		}


		
	}
 ?>