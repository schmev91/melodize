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
    public function show(string $id)
    {
        return response()->json([ track::find($id) ]);
    }

    public function genres(string $id): JsonResponse
    {
        $track = Track::with([ 'genres' => function ($q) {
            $q->select('id', 'name');
        } ])->find($id);

        if (!$track) {
            return response()->json([ 'message' => 'Track not found' ], 404);
        }

        return response()->json($track->genres);
    }

    public function listen(string $id)
    {
        $track = Track::findOrFail($id);
        $track->increment('listens');

        return response()->json([ 'success' => true, 'listens' => $track->listens ]);
    }

}
