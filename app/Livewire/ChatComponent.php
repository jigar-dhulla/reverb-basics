<?php

namespace App\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatComponent extends Component
{
    public $message = '';
    public $conversation = [];

    public function mount()
    {
        $messages = Message::all();
        foreach ($messages as $message) {
            $this->conversation[] = [
                'username' => $message->user->name,
                'message' => $message->message,
            ];
        }
    }

    #[On('echo:our-channel,MessageEvent')]
    public function listenForMessages($data)
    {
        $this->conversation[] = [
            'username' => $data['username'],
            'message' => $data['message'],
        ];
    }

    public function sendMessage()
    {
        // Dispatch Event
        MessageEvent::dispatch(Auth::id(), $this->message);

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
