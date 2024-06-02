<?php

namespace App\Livewire\Client;

use App\Models\Track;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.client') ]
class Home extends Component
{
    public function render()
    {
        $tracks = Track::all();
        return view('livewire.client.home', compact('tracks'));
    }
}
