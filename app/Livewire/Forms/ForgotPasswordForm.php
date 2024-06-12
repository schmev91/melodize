<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ForgotPasswordForm extends Form
{
    const CODE_LABEL   = "forgot_password_code";
    const EMAIL_LABEL  = "forgot_password_email";
    const EXPIRE_LABEL = "forgot_password_code_time";

    #[Rule('nullable|email|max:255') ]
    public ?string $forgotPasswordEmail;
}
