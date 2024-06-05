<?php

namespace App\Livewire\Backdoor;

use App\Models\Genre;
use App\Utils\Message;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.backdoor') ]
class GenresTable extends Component
{
    use WithPagination;

    public string $name = '';

    public function render()
    {
        $genres = Genre::withCount('tracks')->orderBy(Genre::ID, 'desc')->paginate(6);
        return view('livewire.backdoor.genres', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): void
    {
        $validator = Validator::make(
            [ 'name' => $this->name ],
            [ 'name' => 'required|max:255' ]
        );

        if ($validator->fails()) {
            $this->setErrorBag($validator->errors()->toArray());
            $this->dispatch('dialogCollapse', id: 'genreModal');
            return;
        }

        Genre::create($validator->getData());
        Message::flash(Message::SUCCESS());
    }

    public function update(Genre $genre)
    {
        if ('' == $this->name) {
            Message::flash(Message::ERROR("Cannot update since it's the same value"));
            return;
        }
        $genre->update([ 'name' => $this->name ]);

        Message::flash(Message::INFO());
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        Message::flash(Message::ERROR());
    }

}
