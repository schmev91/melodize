<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Header extends Component
{

    public array $route_names = [
        'home',
        'library',
        'about',
     ];

    public string $active_name = 'client.home';

    public function boot()
    {
        $this->active_name = request()->route()->getName();
    }

    public function render()
    {
        return view('livewire.client.header');
    }
}
