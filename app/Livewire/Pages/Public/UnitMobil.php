<?php

namespace App\Livewire\Pages\Public;

use App\Models\Car;
use App\Models\Platno;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class UnitMobil extends Component
{
    public $cars;

    public function mount()
    {
        $this->cars = Car::orderBy('mobil', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.pages.public.unit-mobil');
    }
}
