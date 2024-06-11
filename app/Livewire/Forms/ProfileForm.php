<?php
namespace App\Livewire\Forms;

use App\Livewire\Forms\Auth\RegisterForm;
use Livewire\Attributes\Rule;

class ProfileForm extends RegisterForm
{
    #[Rule('image') ]
    public $avatar;
}
