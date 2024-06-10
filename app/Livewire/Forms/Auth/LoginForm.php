<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|max:255') ]
    public string $username;

    #[Rule('required|max:255') ]
    public string $password;
}
