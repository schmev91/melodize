<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function submitForm()
    {
        dd($this->form->all());
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
