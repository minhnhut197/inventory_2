<?php

namespace App\Livewire;

use Livewire\Component;

class StockTakeComponent extends Component
{
    public function render()
    {
        return view('livewire.stock-take-component')->layout('layouts.base');
    }
}
