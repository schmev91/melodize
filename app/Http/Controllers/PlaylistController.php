<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreplaylistRequest;
use App\Http\Requests\UpdateplaylistRequest;
use App\Models\playlist;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class PlaylistController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $playlists = DB::table('playlists')->get();
        return view('backdoor.playlists-index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreplaylistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplaylistRequest $request, playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playlist $playlist)
    {
        //
    }
}
