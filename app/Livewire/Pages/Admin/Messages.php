<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Messages extends Component
{
    public $messages;

    public function deleteMessage($id)
    {
        Message::where('id',$id)->delete();
        $this->mount();
    }

    public function mount()
    {
        $this->messages = Message::orderBy('created_at','desc')->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.messages');
    }
}
