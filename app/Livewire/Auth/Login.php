<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Utils\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $logination;

    public function boot()
    {
        $this->logination->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->reopenModal();
            }

        });
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $validated = $this->logination->validate();
        if (Auth::attempt($validated)) {
            $this->dispatch('loggedIn');
            return;
        };

        Message::flash(Message::ERROR("Username or Password is not valid"), 'login_message');
        $this->reopenModal();

    }

    public function reopenModal()
    {
        $this->dispatch('dialogCollapse', id: 'login_modal');
    }

}
