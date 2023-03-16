<?php

namespace App\Http\Livewire;

use App\Models\Comuna;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;

class Select3nv1 extends Component
{
    // valores
    public $distrito = '';
    public $provincia = '';
    public $comuna = '';

    // nuevos valores
    public $new_distrito = '';
    public $new_provincia = '';
    public $new_comuna = '';

    // elementos seleccionados
    public $comuna_selected = '';

    // estado actual de distrito
    public $distrito_actual = '';

    // arreglos
    public $distritos = [];
    public $provincias = [];
    public $comunas = [];

    // activador de inputs nuevos
    public $mostrar_nueva_comuna = false;

    public function render()
    {
        return view('livewire.select3nv1');
    }

    public function mount()
    {
        $this->distritos = Distrito::pluck('nombre', 'id')->toarray();
    }

    public function updating()
    {      
        $this->distrito_actual = $this->distrito;
    }

    public function updated()
    {
        $this->limpiar_selects();

        if($this->distrito != '')
        {
            $this->provincias = Provincia::where('distrito_id', $this->distrito)->pluck('nombre', 'id')->toarray();
        }
        $this->cargar_comunas();
    }

    // bloque agregar nuevos registros
    public function agregar_nueva_comuna()
    {
        $validacion = $this->validate(['distrito' => 'required', 'provincia' => 'required', 'new_comuna' => 'required']);
        $comuna = Comuna::create([
            'distrito_id' => $this->distrito,
            'provincia_id' => $this->provincia,
            'nombre' => $this->new_comuna,
        ]);
        // una vez almacenado nuevo registro de debe actualizar componente y dejar como selected el nuevo registro       
        $this->cargar_comunas2($comuna->id, 1);

        // posterior a actualizado de componente se debe ocultar nuevo registro

        $this->emit('mensajear', 'Registro agregado corectamente');





    }

    // cargar comuna
    public function cargar_comunas()
    {
        if($this->distrito != '' and $this->provincia != '')
        {
            // $this->comunas = Comuna::where('provincia_id', $this->provincia)->orderBy('nombre', 'asc')->pluck('nombre', 'id')->toarray();        
            $this->comunas = Comuna::where('provincia_id', $this->provincia)->orderBy('nombre', 'asc');        
        }
    }

    public function cargar_comunas2($id, $tipo)
    {
        if($this->distrito != '' and $this->provincia != '')
        {
            //$comunas = Comuna::where('provincia_id', $this->provincia)->orderBy('nombre', 'asc')->pluck('nombre', 'id')->toarray();
            $this->comunas = Comuna::where('provincia_id', $this->provincia)->orderBy('nombre', 'asc');
            //$this->comunas = obtener_nuevo_arreglo($comunas, (int)$id, (int)$tipo);
            //dd($this->comunas);
        }
    }

    // bloque nuevos registros
    public function toggle_nueva_comuna()
    {
        $this->mostrar_nueva_comuna =! $this->mostrar_nueva_comuna;
    }

    // bloque limpieza de select
    public function limpiar_selects()
    {
        // condición 1: si de des-selecciona distrito
        if($this->distrito == '')
        {
            $this->limpiar_solo_prov_y_com();
        }    
        // condición 2: si de des-selecciona provincia
        if($this->provincia == '')
        {
            $this->limpiar_solo_com();
        }
        // condición 3: si se cambia el estado de la región y esta poblado select columna
        if($this->distrito != $this->distrito_actual and $this->comuna != '')
        {
            $this->limpiar_solo_prov_y_com();
        }        
    }

    public function limpiar_todos_los_selects()
    {
        $this->distrito = '';
        $this->provincia = '';
        $this->comuna = '';
    }

    public function limpiar_solo_prov_y_com()
    {
        $this->provincia = '';
        $this->provincias = [];
        $this->comuna = '';
        $this->comunas = [];
    }

    public function limpiar_solo_com()
    {
        $this->comuna = '';
        $this->comunas = [];
    }         
}
