<?php

namespace App\Livewire\Backdoor;

use App\Models\Genre;
use App\Models\Track;
use App\Utils\Message;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.backdoor') ]
class TracksTable extends Component
{
    use WithPagination;

    public array $currentTrackGenres = [  ];

    public function render()
    {
        $tracks = Track::orderBy(track::ID, 'desc')->paginate(6);
        $genres = Genre::all([ genre::ID, genre::NAME ]);
        return view('livewire.backdoor.tracks', compact('tracks', 'genres'));
    }

    public function updateTrackGenres(Track $track)
    {
        try {
            $newGenres = array_map(fn($genre) => $genre[ 'id' ], $this->currentTrackGenres);
            $track->genres()->sync($newGenres);
            Message::flash(Message::INFO('Updated genres for ' . $track[ track::TITLE ] . " successfully"));
        } catch (\Throwable $th) {
            Message::flash(Message::ERROR('Failed to update genres for ' . $track[ track::TITLE ]));
        }
    }

}
