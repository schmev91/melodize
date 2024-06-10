<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $registration;

    public function boot()
    {
        $this->registration->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->dispatch('dialogCollapse', id: 'register_modal');
            }

        });
    }

    public function register()
    {
        $this->registration->validate();
        $user = User::create([
             ...$this->registration->all(),
            user::PASSWORD => Hash::make($this->registration->password),
         ]);

        Auth::login($user);

        // $this->redirect('/', true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
