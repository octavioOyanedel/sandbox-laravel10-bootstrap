<?php
# Helper para módulo de select cascada de 3 niveles

# evalua nuevo registro
function obtener_nuevo_registro($seleccionado, $nuevo)
{
    if($seleccionado != '' and $nuevo != ''){ return false; }
    if($seleccionado != '' and $nuevo == ''){ return $seleccionado; }
    if($seleccionado == '' and $nuevo == ''){ return false; }
    if($seleccionado == '' and $nuevo != ''){ return $nuevo; }
}

?>