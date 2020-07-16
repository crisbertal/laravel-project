<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditStep extends Component
{
    public $steps = [];

    // metodo usado para recoger los parametros pasasdos al componente en el HTML
    public function mount($steps)
    {
        // los steps se pasan a un array para poder incrementarlos en caso de que sea necesario 
        $this->steps = $steps->toArray();
    }

    public function increment()
    {
        // agrega al array el total de elementos que contiene 
        $this->steps[] = count($this->steps);
    }

    public function remove($index)
    {
        unset($this->steps[$index]);
    }

    public function render()
    {
        return view('livewire.edit-step');
    }
}
