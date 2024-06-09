<?php

namespace App\Livewire\Client;

use App\Services\TrackService;
use Illuminate\Support\Collection;
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

    public function boot()
    {
        $this->active_name  = request()->route()->getName();
        $this->searchResult = new Collection();
    }

    public function render()
    {
        return view('livewire.client.header');
    }

    public function searchTracks()
    {
        $this->searchResult = TrackService::search($this->search);
    }

    public function updatedSearch()
    {
        $this->searchTracks();
    }
}
