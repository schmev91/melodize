<?php

namespace App\Livewire\Client;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.client') ]
class About extends Component
{
    public function render()
    {
        return view('livewire.client.about');
    }
}
