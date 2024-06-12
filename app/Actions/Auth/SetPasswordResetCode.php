<?php

namespace App\Actions\Auth;

use App\Mail\passwordResetCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class SetPasswordResetCode
{
    use AsAction;

    public function handle(string $email)
    {
         // Generate a random code
         $code = rand(100000, 999999);

         // Store the code, email, and timestamp in the session
         Session::put('forgot_password_code', $code);
         Session::put('forgot_password_email', $email);
         Session::put('forgot_password_code_time', now());
 
         // Send the code to the user's email
         Mail::to($email)->send(new passwordResetCodeMail($code));
    }
}
