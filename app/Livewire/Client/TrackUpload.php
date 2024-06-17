<?php

namespace App\Livewire\Client;

use App\Actions\Tracks\UploadTrackAction;
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

    public function uploadTrack(UploadTrackAction $action)
    {
        // handling user_id, cover, url
        $validated = $this->newTrack->validate();
        $action->handle($validated);

    }
    public function updated()
    {
        $this->openModal($this::$modal);
    }

    public function updatedNewTrackAudio()
    {
        $this->dispatch(self::uploaded_event);
        $this->dismissToasst('uploading-audio');
    }

    public function updatedNewTrackCover()
    {
        $this->dispatch(self::uploaded_event);
        $this->dismissToasst('uploading-cover');
    }
}
