<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class redeemPasswordResetForm extends Form
{
    #[Rule('numeric|required|digits:6') ]
    public $code;
}
