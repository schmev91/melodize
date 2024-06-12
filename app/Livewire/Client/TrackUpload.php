<?php

namespace App\Livewire\Client;

use App\Livewire\Forms\TrackUploadForm;
use App\Traits\ModalInteraction;
use App\Traits\UseToast;
use Livewire\Component;
use Livewire\WithFileUploads;

class TrackUpload extends Component
{
    use ModalInteraction, UseToast, WithFileUploads;

    public static string $modal = 'trackUpload_modal';

    public TrackUploadForm $trackUploadForm;

    public function boot()
    {
        $this->setFailModalHook($this->trackUploadForm, $this::$modal);

    }

    public function render()
    {
        return view('livewire.client.track-upload');
    }

    public function uploadTrack()
    {
        // handling user_id, cover, url
        $this->trackUploadForm->validate();
        $this->dispatch('upload-track-request', ...$this->trackUploadForm->all());

    }
}
