<?php

namespace App\Livewire\Backdoor;

use App\Models\Genre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.backdoor') ]
class Genres extends Component
{
    use WithPagination;

    public function render()
    {
        $genres = Genre::paginate(9);
        return view('livewire.backdoor.genres', compact('genres'));
    }
}
