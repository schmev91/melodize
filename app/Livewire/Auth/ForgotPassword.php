<?php

namespace App\Livewire\Auth;

use App\Actions\Auth\redeemPasswordResetCode;
use App\Actions\Auth\SetPasswordResetCode;
use App\Livewire\Forms\ForgotPasswordForm;
use App\Livewire\Forms\redeemPasswordResetForm;
use App\Livewire\Forms\resetPasswordForm;
use App\Models\User;
use App\Traits\ModalInteraction;
use App\Traits\UseToast;
use App\Utils\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ForgotPassword extends Component
{
    use ModalInteraction, UseToast;

    public static string $forgotPasswordModal  = "forgotPassword_modal";
    public static string $resetRedemptionModal = "resetCodeRedemption_modal";
    public static string $resetPasswordModal   = "resetPassword_modal";

    public ForgotPasswordForm $forgotten;
    public redeemPasswordResetForm $redemption;
    public resetPasswordForm $resetPw;

    public static string $redeem_message_label = "passwordRedemption_message";

    public function boot()
    {
        $this->setFailModalHook($this->forgotten, $this::$forgotPasswordModal);
        $this->setFailModalHook($this->redemption, $this::$resetRedemptionModal);
        $this->setFailModalHook($this->resetPw, $this::$resetPasswordModal);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function sendPasswordResetCode(SetPasswordResetCode $setResetCode)
    {
        $this->forgotten->validate();
        $isEmailExist = User::where('email', $this->forgotten->forgotPasswordEmail)->exists();

        if ($isEmailExist) {
            $setResetCode->handle($this->forgotten->forgotPasswordEmail);
            $this->openModal($this::$resetRedemptionModal);
        }

    }

    public function redeemPasswordResetCode(redeemPasswordResetCode $redeem)
    {
        $this->redemption->validate();
        $isSuccess = $redeem->handle($this->redemption->code);

        if (!$isSuccess) {
            Message::flash(Message::ERROR("Invalid code"), $this::$redeem_message_label);
            $this->openModal($this::$resetRedemptionModal);
            return;
        }

        $this->redemption->reset();
        Session::put('isAllowResetPassword', true);
        $this->sendToast('Redeem successfully, you can now reset your password');
        $this->openModal($this::$resetPasswordModal);
    }

    public function resetPassword()
    {

        if (!Session::get('isAllowResetPassword')) {
            $this->sendToast('Nah man, quit that shit');
            return;
        };

        $this->resetPw->validate();

        if ($this->resetPw->password != $this->resetPw->confirm) {
            $this->setErrorBag([ 'resetPw.confirm' => 'Confirm password does not match' ]);
            $this->openModal($this::$resetPasswordModal);
            return;
        }

        $user = User::where("email", Session::get(ForgotPasswordForm::EMAIL_LABEL));
        $user->update([ user::PASSWORD => Hash::make($this->resetPw->password) ]);

        $this->resetPw->reset();
        Session::put('isAllowResetPassword', false);
        $this->sendToast('Reset password successfully!');
        $this->openModal(Login::$modalId);

    }
}
