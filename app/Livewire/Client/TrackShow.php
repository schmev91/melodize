<?php

namespace App\Livewire\Client;

use App\Models\Comment;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app') ]
class TrackShow extends Component
{
    public Track $track;
    public string $comment_content;

    public function mount(Track $track)
    {
        $track->load('genres');
        $this->track = $track;
    }

    public function render()
    {
        $related  = Track::where('id', '!=', $this->track->id)->get();
        $comments = $this->track->comments()->orderBy(Comment::CREATED_AT, 'desc')->get();
        return view('livewire.client.track-show', [
            'track' => $this->track,
            ...compact('related', 'comments'),
         ])->title($this->track->title);
    }

    public function comment(float $timestamp = null)
    {
        $this->track->comments()->create([ 'content' => $this->comment_content, Comment::USER_ID => Auth::user()->id ]);
        $this->comment_content = '';
    }
}
