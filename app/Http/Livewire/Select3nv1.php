<?php

namespace App\Http\Livewire;

use App\Models\Comuna;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;

class Select3nv1 extends Component
{
    public $distrito = '';

    public $distritos = [];

    public $new_distrito = '';

    public $ver_new_distrito = false;

    public function render()
    {
        return view('livewire.select3nv1');
    }

    public function mount()
    {
        $this->distritos = Distrito::orderBy('nombre', 'asc')->get();
    }

    public function boton_distrito()
    {
        $this->ver_new_distrito =! $this->ver_new_distrito;
    }

    public function agregar_distrito()
    {
        $validacion = $this->validate(['new_distrito' => 'required']);

        $distrito = Distrito::create([
            'nombre' => $this->new_distrito,
        ]);

        $this->distritos = preparar_coleccion_distritos_para_recarga_select(Distrito::orderBy('nombre', 'asc')->get(), $distrito->id);

        $this->ver_new_distrito = false;
        $this->new_distrito = '';

        $this->emit('mensajear', 'Registro agregado corectamente');
    }
}
