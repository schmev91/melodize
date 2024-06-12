<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class resetPasswordForm extends Form
{
    #[Rule('required|max:256') ]
    public string $password = "";
    #[Rule('required|max:256') ]
    public string $confirm = "";
}
