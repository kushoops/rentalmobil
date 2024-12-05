<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Message;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public $car;
    public $booking;
    public $message;

    public function mount()
    {
        $this->car = Car::all();
        $this->booking = Booking::all();
        $this->message = Message::all();
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}
