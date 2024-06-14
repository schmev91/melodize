<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Models\User;
use App\Traits\ModalInteraction;
use App\Traits\UseToast;
use App\Utils\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    use ModalInteraction, UseToast;

    public static string $modalId = "login_modal";

    public static string $message_label = "login_message";

    public LoginForm $logination;

    public function boot()
    {
        $this->setFailModalHook($this->logination, $this::$modalId);

    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $validated = $this->logination->validate();
        if (Auth::attempt($validated)) {
            $this->dispatch('refresh-permission');
            $this->redirect(url()->previous(), true);
            $this->sendToast('Welcome back, ' . Auth::user()->name);
            return;
        };

        Message::flash(Message::ERROR("Username or Password is not valid"), $this::$message_label);
        $this->openModal($this::$modalId);

    }

}
