<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Header extends Component
{
    public array $route_names = [
        'home',
        'library',
     ];

    public string $active_name = 'client.home';

    public function mount()
    {

    }

    public function refresh_header($name)
    {
        dd($name);
    }

    public function render()
    {
        return view('livewire.client.header');
    }
}
