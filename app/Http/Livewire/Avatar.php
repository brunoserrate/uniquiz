<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class Avatar extends Component
{
    public $avatar = '';

    public function render()
    {
        return view('livewire.avatar');
    }

    public function mount() {

        $this->avatar = Cache::get('user_avatar');

        if (empty($this->avatar)) {

            $name = '';
            $name = strtolower( str_replace(' ', '', Auth::user()->name ) );

            $response = Http::get('https://avatars.dicebear.com/api/initials/'. $name .'.svg');
            $this->avatar = trim($response->body());
        }
    }
}
