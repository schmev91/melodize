<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Rule('required|max:255') ]
    public string $username = '';

    #[Rule('required|max:255') ]
    public string $name = '';

    #[Rule('required|email|max:255') ]
    public string $email = '';

    #[Rule('required|max:255') ]
    public string $password = '';
}
