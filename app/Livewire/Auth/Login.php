<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $loginForm;

    public function submitForm()
    {
        dd('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
