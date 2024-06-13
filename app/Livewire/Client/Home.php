<?php

namespace App\Livewire\Client;

use App\Models\Track;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app') ]
#[Title('Home') ]
class Home extends Component
{
    public function render()
    {
        $tracks = Track::orderBy("created_at", 'desc')->get();
        return view('livewire.client.home', compact('tracks'));
    }
}
