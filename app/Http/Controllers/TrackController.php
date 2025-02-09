<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretrackRequest;
use App\Http\Requests\UpdatetrackRequest;
use App\Models\Track;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class TrackController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tracks = DB::table('tracks')->get();
        return view('backdoor.tracks-index', compact("tracks"));
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
    public function store(StoretrackRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetrackRequest $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
    }
}
