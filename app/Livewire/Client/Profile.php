<?php

namespace App\Livewire\Client;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use App\Traits\ModalInteraction;
use App\Traits\UseToast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use ModalInteraction, UseToast, WithFileUploads;
    public static string $modalId = 'profile_modal';

    public User $user;

    public ProfileForm $profile;

    public function mount()
    {
        $this->user = Auth::user();
        $this->profile->fill($this->user);
    }

    public function render()
    {
        return view('livewire.client.profile', [
            'user' => $this->user,
         ]);
    }

    public function change(string $field)
    {
        $this->profile->validateOnly($field);
        if (user::PASSWORD == $field) {
            ${user::PASSWORD} = Hash::make($this->profile->{$field});
            $this->user->update(compact(user::PASSWORD));
        } else {
            $this->user->update([ $field => $this->profile->{$field} ]);
        }

        $this->dispatch('profile-updated');
        $this->sendToast("Update $field successfully");
        $this->resetErrorBag();
        $this->openModal($this::$modalId);
    }

    public function changeAvatar()
    {
        $this->profile->validateOnly('avatarImg');
        $this->openModal($this::$modalId);

        Storage::delete($this->user->avatar);

        $imgName = uniqid() . '.' . $this->profile->avatarImg->getClientOriginalExtension();

        $this->profile->avatarImg->storeAs("public/img/avatars", $imgName);

        $avatar = "img/avatars/" . $imgName;
        if (!file_exists(public_path("storage/$avatar"))) {
            $this->sendToast('An error has occured');
            return;
        }

        $this->user->update(compact(user::AVATAR));
        $this->sendToast('Update avatar successfully');
    }

    public function updatedProfileAvatarImg()
    {
        $this->openModal($this::$modalId);
    }

    public function boot()
    {
        $this->profile->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->openModal($this::$modalId);
            }

        });
    }
}
