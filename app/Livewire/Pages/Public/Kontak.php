<?php

namespace App\Livewire\Pages\Public;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Kontak extends Component
{
    public $nama;
    public $email;
    public $telp;
    public $message;

    public function createMessage()
    {
        Message::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'telp' => $this->telp,
            'message' => $this->message,
        ]);

        return redirect()->route('kontak');
    }

    public function render()
    {
        return view('livewire.pages.public.kontak');
    }
}
