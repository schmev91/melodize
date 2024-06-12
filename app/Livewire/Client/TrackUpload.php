<?php

namespace App\Livewire\Client;

use App\Livewire\Forms\TrackUploadForm;
use Livewire\Component;

class TrackUpload extends Component
{
    public TrackUploadForm $trackUpload;

    public function render()
    {
        return view('livewire.client.track-upload');
    }

    public function upload()
    {
        // handling user_id, cover, url
        
    }
}
