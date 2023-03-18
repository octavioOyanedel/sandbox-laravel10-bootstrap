<?php

# Helper para módulo de select cascada de 3 niveles

use App\Models\Distrito;

# genera nuevo array con el nuevo registro en primera posición
function preparar_coleccion_para_recarga_select($coleccion, $id)
{
	// preparar colección para re-poblado de select
	$objeto = $coleccion->firstWhere('id', $id);
	$coleccion->prepend($objeto);
	$coleccion = $coleccion->unique('nombre');
	return $coleccion;
}

?>