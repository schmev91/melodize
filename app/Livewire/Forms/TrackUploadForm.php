<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class TrackUploadForm extends Form
{
    #[Validate('required|max:255') ]
    public string $title = "";

    #[Validate('required|max:255') ]
    public string $artist = "";

    #[Validate('nullable|max:255') ]
    public string $description = "";

    #[Validate('nullable|image|max:3072') ]
    public TemporaryUploadedFile $coverImg;

    #[Validate('nullable|mimes:mp3,wav,m4a,flac|max:10240') ]
    public TemporaryUploadedFile $audio;
}
