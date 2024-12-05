<?php

namespace App\Livewire\Pages\Public;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Profil extends Component
{
    public function render()
    {
        return view('livewire.pages.public.profil');
    }
}
