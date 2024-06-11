<?php

namespace App\Livewire\Client;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    protected User $user;

    public ProfileForm $profile;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.client.profile', [
            'user' => $this->user,
         ]);
    }
}
