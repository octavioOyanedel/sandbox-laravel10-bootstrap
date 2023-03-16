<?php
# Helper para módulo de select cascada de 3 niveles

# genera nuevo array con el nuevo registro en primera posición
# 0 : proviene de carga inicial
# 1 : proviene de carga con nuevo registro
function obtener_nuevo_arreglo($array, $id, $tipo)
{
	$array_ = [];
	if($id != 0 and $tipo != 0)
	{
		//sacar elemento
		$nombre = $array[$id];
		unset($array[$id]);
		//reverse array
		$array_ = array_reverse($array, true);
		//agregar elemento
		$array_[$id] = $nombre;
		//reverse array
		$array_ = array_reverse($array_, true);	
	}
	return $array_;
}

?>