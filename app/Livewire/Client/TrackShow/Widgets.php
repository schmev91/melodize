<?php

namespace App\Livewire\Client\TrackShow;

use App\Interfaces\TrackWidgetsInterface;
use App\Models\Comment;
use App\Models\Playlist;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Widgets extends Component implements TrackWidgetsInterface
{
    public $track;

    public Collection $comments;

    public string $comment_content;

    public function mount($track)
    {
        $this->track    = $track;
        $this->comments = $this->track->comments()->orderBy(Comment::CREATED_AT, 'desc')->get();

    }

    public function render()
    {
        return view('livewire.client.track-show.widgets');
    }

    public function comment(?float $timestamp = null): void
    {
        $comment = $this->track->comments()->create([
            'content' => $this->comment_content
            , Comment::USER_ID => Auth::user()->id
            , Comment::AT => $timestamp ]);
        $this->comments->prepend($comment);
        $this->comment_content = '';
    }

    public function like(): void
    {
        dd('like');
    }

    public function addPlaylist(Playlist $playlist): void
    {

    }

    public function addQueue(): void
    {

    }
}
