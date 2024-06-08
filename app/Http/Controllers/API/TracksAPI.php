<?php

namespace App\Http\Controllers\API;

use App\Models\Track;
use Illuminate\Http\JsonResponse;

class TracksAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Track::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    public function genres(string $id): JsonResponse
    {
        $track = Track::find($id);
        return response()->json($track->genres);
    }

}
