<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $registerForm;

    public function register()
    {
        dd($this->registerForm->validate());

        // $this->redirect('/', true);
    }

    public function rendered()
    {
        $this->dispatch('rerenderRegister');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
