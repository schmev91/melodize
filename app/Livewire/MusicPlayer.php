<?php

namespace App\Livewire;

use Livewire\Component;

class MusicPlayer extends Component
{

    public function test(){
        dd('haha');
    }
    
    public function render()
    {
        return view('livewire.music-player');
    }
}
