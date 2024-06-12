<?php

namespace App\Actions\Auth;

use App\Livewire\Forms\ForgotPasswordForm;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class redeemPasswordResetCode
{
    use AsAction;

    public function handle($code): bool
    {
        // Check if the code has expired
        $expireTime = Session::get(ForgotPasswordForm::EXPIRE_LABEL);
        if (now()->diffInMinutes($expireTime) > 10) {
            // CODE HAS EXPIRED
            return false;
        }

        if (!(Session::get(ForgotPasswordForm::CODE_LABEL) == $code)) {
            // CODE DOES NOT MATCH
            return false;
        }

        return true;
    }
}
