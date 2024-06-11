<?php
namespace App\Livewire\Forms;

use App\Livewire\Forms\Auth\RegisterForm;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProfileForm extends RegisterForm
{
    #[Rule('image|max:2048') ]
    public ?TemporaryUploadedFile $avatarImg = null;
}
