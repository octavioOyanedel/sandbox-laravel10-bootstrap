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

    // variables provincia
    public $provincia = '';
    public $provincias = [];

    // variables comuna
    public $comuna = '';
    public $comunas = [];

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
        $this->provincias = Provincia::where('distrito_id', $value)->orderBy('nombre', 'asc')->get();
        $this->comunas = [];

    }

    public function updatedProvincia($value)
    {
        $this->comunas = Comuna::where('distrito_id', $this->distrito)->where('provincia_id', $value)->orderBy('nombre', 'asc')->get();
    }
}
