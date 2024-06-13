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

    public TrackUploadForm $newTrack;

    public function boot()
    {
        $this->setFailModalHook($this->newTrack, $this::$modal);

    }

    public function render()
    {
        return view('livewire.client.track-upload');
    }

    public function uploadTrack()
    {
        // handling user_id, cover, url
        $this->newTrack->validate();

    }
    public function updated()
    {
        $this->openModal($this::$modal);
    }

    // public function updatingNewTrackAudio()
    // {
    //     $this->sendToast("I'm uploading your track", ToastType::PERSIST, 'uploading-audio');
    // }

    public function updatedNewTrackAudio()
    {
        $this->dismissToasst('uploading-audio');
    }
}
