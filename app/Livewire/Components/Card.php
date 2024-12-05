<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Card extends Component
{
    public $gambar;
    public $mobil;
    public $harga;

    public function render()
    {
        return view('livewire.components.card');
    }
}
