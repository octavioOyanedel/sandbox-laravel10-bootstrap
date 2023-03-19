<?php

namespace App\Http\Livewire;

use App\Models\Comuna;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;

class Select3nv1 extends Component
{
    // variables distrito
    public $distrito = '';
    public $distritos = [];
    public $new_distrito = '';
    public $icono_add_distrito = false;
    public $ver_new_distrito = false;

    // variables provincia
    public $provincia = '';
    public $provincias = [];
    public $new_provincia = '';
    public $icono_add_provincia = false;
    public $ver_new_provincia = false;

    // variables comuna
    public $comuna = '';
    public $comunas = [];
    public $new_comuna = '';
    public $icono_add_comuna = false;
    public $ver_new_comuna = false;

    public function render()
    {
        return view('livewire.select3nv1');
    }

    public function mount()
    {
        $this->distritos = Distrito::orderBy('nombre', 'asc')->get();
    }

    public function updatedDistrito($value)
    {
        $this->provincias = [];
        $this->provincia = '';
        $this->comunas = [];
        $this->comuna = '';
        $this->provincias = Provincia::where('distrito_id', $value)->orderBy('nombre', 'asc')->get();
    }

    public function updatedProvincia($value)
    {
        $this->comunas = [];
        $this->comuna = '';
        $this->comunas = Comuna::where('distrito_id', $this->distrito)->where('provincia_id', $value)->orderBy('nombre', 'asc')->get();
    }

    public function agregar_distrito()
    {
        $validacion = $this->validate(['new_distrito' => 'required']);
        $distrito = Distrito::create([
            'nombre' => $this->new_distrito,
        ]);
        $this->distritos = preparar_coleccion_para_recarga_select(Distrito::orderBy('nombre', 'asc')->get(), $distrito->id);
        $this->boton_add_distrito();
        $this->emit('mensajear', 'Registro agregado corectamente');
    }

    public function agregar_provincia()
    {
        $validacion = $this->validate(['distrito' => 'required', 'new_provincia' => 'required']);
        $provincia = Provincia::create([
            'distrito_id' =>  $this->distrito,
            'nombre' => $this->new_provincia,
        ]);
        $this->provincias = preparar_coleccion_para_recarga_select(Provincia::where('distrito_id', $this->distrito)->orderBy('nombre', 'asc')->get(), $provincia->id);
        $this->boton_add_provincia();
        $this->emit('mensajear', 'Registro agregado corectamente');
    }

    public function agregar_comuna()
    {
        $validacion = $this->validate(['distrito' => 'required', 'provincia' => 'required', 'new_comuna' => 'required']);
        $comuna = Comuna::create([
            'distrito_id' =>  $this->distrito,
            'provincia_id' =>  $this->provincia,
            'nombre' => $this->new_comuna,
        ]);
        $this->comunas = preparar_coleccion_para_recarga_select(Comuna::where('distrito_id', $this->distrito)->where('provincia_id', $this->provincia)->orderBy('nombre', 'asc')->get(), $comuna->id);
        $this->boton_add_comuna();
        $this->emit('mensajear', 'Registro agregado corectamente');
    }

    public function boton_add_distrito()
    {
        $this->icono_add_distrito =! $this->icono_add_distrito;
        $this->ver_new_distrito =! $this->ver_new_distrito;
    }

    public function boton_add_provincia()
    {
        $this->icono_add_provincia =! $this->icono_add_provincia;
        $this->ver_new_provincia =! $this->ver_new_provincia;
    }

    public function boton_add_comuna()
    {
        $this->icono_add_comuna =! $this->icono_add_comuna;
        $this->ver_new_comuna =! $this->ver_new_comuna;
    }
 
}
