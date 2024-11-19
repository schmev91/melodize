<?php

namespace App\Livewire\Client\TrackShow;

use App\Interfaces\TrackWidgetsInterface;
use App\Models\Comment;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\User;
use App\Traits\UseToast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Widgets extends Component implements TrackWidgetsInterface
{
    use UseToast;

    public Track $track;
    public bool $isLiked;

    public Collection $comments;

    public string $comment_content;

    public function mount($track)
    {
        $this->track    = $track;
        $this->isLiked  = $this->track->likedUsers->contains(Auth::id());
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
        if (!Auth::check()) {
            $this->sendToastError();
            return;
        };

        try {
            if (!$this->isLiked) {
                $this->track->likedUsers->create([
                    track::USER_ID => Auth::id(),
                 ]);

                $this->sendToast('Added to your likes!');
                return;
            }

            $this->track->likedUsers()->where(Track::USER_ID, Auth::id())->delete();
            $this->sendToast('Removed from your likes!');

        } catch (\Throwable $th) {
            $this->sendToastError();
        }
    }

    public function addPlaylist(Playlist $playlist): void
    {

    }

    public function addQueue(): void
    {

    }
}
