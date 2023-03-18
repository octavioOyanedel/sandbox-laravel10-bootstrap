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
    public $ver_new_distrito = false;
    public $ver_icono_mas_distrito = true;

    // variables provincia
    public $provincia = '';
    public $provincias = [];
    public $new_provincia = '';
    public $ver_new_provincia = false;
    public $ver_icono_mas_provincia = true;

    public function render()
    {
        return view('livewire.select3nv1');
    }

    public function mount()
    {
        $this->distritos = Distrito::orderBy('nombre', 'asc')->get();
    }

    public function updated()
    {
        $this->provincias = Provincia::where('distrito_id', $this->distrito)->orderBy('nombre', 'asc')->get();
    }

    public function agregar_distrito()
    {
        $this->distrito = '';
        $validacion = $this->validate(['new_distrito' => 'required']);
        $distrito = Distrito::create([
            'nombre' => $this->new_distrito,
        ]);
        $this->distrito = '';
        $this->new_distrito = '';
        $this->distritos = preparar_coleccion_para_recarga_select(Distrito::orderBy('nombre', 'asc')->get(), $distrito->id);
        $this->ver_new_distrito = false;    
        $this->ver_icono_mas_distrito =! $this->ver_icono_mas_distrito;
        $this->emit('mensajear', 'Registro agregado corectamente');
    }

    public function agregar_provincia()
    {
        $this->provincia = '';
        $validacion = $this->validate(['distrito' => 'required', 'new_provincia' => 'required']);
        $provincia = Provincia::create([
            'distrito_id' =>  $this->distrito,
            'nombre' => $this->new_provincia,
        ]);
        $this->provincia = '';
        $this->new_provincia = '';
        $this->provincias = preparar_coleccion_para_recarga_select(Provincia::where('distrito_id', $this->distrito)->orderBy('nombre', 'asc')->get(), $provincia->id);
        $this->ver_new_provincia = false;    
        $this->ver_icono_mas_provincia =! $this->ver_icono_mas_provincia;
        $this->emit('mensajear', 'Registro agregado corectamente');
    }

    // manejo de botones
    public function boton_distrito()
    {
        $this->ver_new_distrito =! $this->ver_new_distrito;
        $this->ver_icono_mas_distrito =! $this->ver_icono_mas_distrito;
    }

    public function boton_provincia()
    {
        $this->ver_new_provincia =! $this->ver_new_provincia;
        $this->ver_icono_mas_provincia =! $this->ver_icono_mas_provincia;
    }      
}
