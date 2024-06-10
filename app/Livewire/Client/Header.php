<?php

namespace App\Livewire\Client;

use App\Services\TrackService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public string $search;
    public Collection $searchResult;

    public array $route_names = [
        'home',
        'library',
        'about',
     ];

    public string $active_name = 'client.home';

    #[On('loggedIn') ]
    public function render()
    {
        return view('livewire.client.header');
    }

    public function boot()
    {
        $this->active_name  = request()->route()->getName();
        $this->searchResult = new Collection();
    }

    public function searchTracks()
    {
        $this->searchResult = TrackService::search($this->search);
    }

    public function updatedSearch($value)
    {
        if ('' == $value) {
            return;
        }

        $this->searchTracks();

    }

    public function logout(): void
    {
        Auth::logout();
    }
}
