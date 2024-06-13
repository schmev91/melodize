<?php

namespace App\Livewire\Backdoor;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app') ]
class UsersTable extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::orderBy(user::ID, 'desc')->paginate(6);
        return view('livewire.backdoor.users-table', compact('users'));
    }
}
