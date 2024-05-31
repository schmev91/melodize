<?php

namespace App\Http\Controllers\Backdoor;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $tracks_count    = DB::table('tracks')->count();
        $playlists_count = DB::table('playlists')->count();
        return view('backdoor.dashboard', compact('tracks_count', 'playlists_count'));
    }
}
