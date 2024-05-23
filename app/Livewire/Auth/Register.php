<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function submitForm()
    {
        dd($this->form);
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
