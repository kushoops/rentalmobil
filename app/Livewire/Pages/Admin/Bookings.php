<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Bookings extends Component
{
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::orderBy('created_at','desc')->get();
    }
    public function render()
    {
        return view('livewire.pages.admin.bookings');
    }
}
