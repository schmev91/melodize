<?php

namespace App\Livewire\Backdoor;

use App\Models\Genre;
use App\Models\Track;
use App\Traits\UseToast;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app') ]
class TracksTable extends Component
{
    use WithPagination, UseToast;

    public array $currentTrackGenres = [  ];

    public function render()
    {
        $tracks = Track::orderBy(track::ID, 'desc')->paginate(6);
        $genres = Genre::all([ genre::ID, genre::NAME ]);
        return view('livewire.backdoor.tracks-table', compact('tracks', 'genres'));
    }

    public function updateTrackGenres(Track $track)
    {
        try {
            $newGenres = array_map(fn($genre) => $genre[ 'id' ], $this->currentTrackGenres);
            $track->genres()->sync($newGenres);
            $this->sendToast("I have update genres for " . $track[ track::TITLE ]);
        } catch (\Throwable $th) {
            $this->sendToast('Failed to update genres for ' . $track[ track::TITLE ]);
        }
    }

    public function destroy(Track $track)
    {
        try {
            $track->delete();
            $this->sendToast("I have deleted " . $track[ track::TITLE ]);
        } catch (\Throwable $th) {
            $this->sendToast('Failed to delete ' . $track[ track::TITLE ]);
        }
    }

}
