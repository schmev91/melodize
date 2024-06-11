<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Models\User;
use App\Traits\ModalInteraction;
use App\Utils\Message;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    use ModalInteraction;
    public static string $modalId = "register_modal";

    public RegisterForm $registration;

    public function boot()
    {
        $this->registration->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->openModal($this::$modalId);
            }

        });
    }

    public function register()
    {
        $this->registration->validate();
        User::create([
             ...$this->registration->all(),
            user::PASSWORD => Hash::make($this->registration->password),
         ]);

        Message::flash(Message::SUCCESS('Registration successfully, please login.'), Login::$message_label);
        $this->openModal(Login::$modalId);

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
