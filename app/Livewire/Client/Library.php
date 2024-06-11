<?php

namespace App\Livewire\Client;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.client') ]
class Library extends Component
{
    public function render()
    {
        $tracks = Auth::user()->tracks;

        return view('livewire.client.library', compact('tracks'));
    }
}
