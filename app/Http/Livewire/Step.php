<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $steps = [];

    public function increment()
    {
        // agrega al array el total de elementos que contiene +1 
        $this->steps[] = count($this->steps) + 1;
    }

    public function remove($index)
    {
        unset($this->steps[$index]);
    }

    public function render()
    {
        return view('livewire.step');
    }
}
