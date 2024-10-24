<?php

namespace App\Livewire;

use Livewire\Component;

class AddStockTakeComponent extends Component
{
    public function render()
    {
        return view('livewire.add-stock-take-component')->layout('layouts.base');
    }
}
