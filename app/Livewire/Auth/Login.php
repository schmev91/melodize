<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $logination;

    public function boot()
    {
        $this->logination->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->dispatch('dialogCollapse', id: 'login_modal');
            }

        });
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $validated = $this->logination->validate();
        Auth::attempt($validated);

    }

}
