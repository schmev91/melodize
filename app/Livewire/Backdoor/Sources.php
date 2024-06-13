<?php

namespace App\Livewire\Backdoor;

use App\Models\Source;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app') ]
class Sources extends Component
{
    public function render()
    {
        $sources = Source::orderBy(source::ID, 'desc')->paginate(6);
        return view('livewire.backdoor.sources', compact('sources'));
    }
}
