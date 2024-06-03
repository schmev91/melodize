<?php

namespace App\Livewire\Backdoor;

use App\Models\Genre;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.backdoor') ]
class Genres extends Component
{
    use WithPagination;


    public function render()
    {
        $genres = Genre::withCount('tracks')->orderBy(Genre::ID, 'desc')->paginate(6);
        return view('livewire.backdoor.genres', compact('genres'));
    }
}
