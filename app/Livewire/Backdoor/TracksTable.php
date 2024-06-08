<?php

namespace App\Livewire\Backdoor;

use App\Models\Genre;
use App\Models\Track;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.backdoor') ]
class TracksTable extends Component
{
    use WithPagination;

    public function render()
    {
        $tracks = Track::orderBy(track::ID, 'desc')->paginate(6);
        $genres = Genre::all([ genre::ID, genre::NAME ]);
        return view('livewire.backdoor.tracks', compact('tracks', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): void
    {
        // $validator = Validator::make(
        //     [ 'name' => $this->name ],
        //     [ 'name' => 'required|max:255' ]
        // );

        // if ($validator->fails()) {
        //     $this->setErrorBag($validator->errors()->toArray());
        //     $this->dispatch('dialogCollapse', id: 'genreModal');
        //     return;
        // }

        // Track::create($validator->getData());
        // Message::flash(Message::SUCCESS());
    }

    public function update(Track $track)
    {
        // if ('' == $this->name) {
        //     Message::flash(Message::ERROR("Cannot update since it's the same value"));
        //     return;
        // }
        // $track->update([ 'name' => $this->name ]);

        // Message::flash(Message::INFO());
    }

    public function destroy(Track $track)
    {
        // $track->delete();
        // Message::flash(Message::ERROR());
    }
}
