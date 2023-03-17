<?php

# Helper para módulo de select cascada de 3 niveles

use App\Models\Distrito;

# genera nuevo array con el nuevo registro en primera posición
function preparar_coleccion_distritos_para_recarga_select($distritos, $id)
{
	$distritos = Distrito::orderBy('nombre', 'asc')->get();	
	// preparar colección para re-poblado de select
	$distrito = $distritos->firstWhere('id', $id);
	$distritos->prepend($distrito);
	$distritos = $distritos->unique('nombre');
	return $distritos;
}

?>