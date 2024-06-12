<?php

namespace App\Http\Controllers\API;

use App\Models\Track;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TracksAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Track::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'artist'      => 'required|max:255',
            'description' => 'nullable|max:255',
            'audio'       => 'required|mimes:mp3,m4a,flac|max:10000',
            'cover'       => 'nullable|image|max:3000',
            'user_id'     => 'required|numeric',
         ]);

        if (isset($validated[ Track::COVER ])) {
            $validated[ Track::COVER ] = str_replace('public/', "", $request->file(Track::COVER)->store('public/img/covers'));
        } else {
            $validated[ Track::COVER ] = Track::DEFAULT_COVER;
        }

        $validated[ track::URL ] = str_replace('public/', "", $request->file('audio')->store('public/tracks'));

        if (!file_exists($validated[ track::URL ])) {
            return response()->json([ 'message' => 'an error has occur' ], 500);
        }

        Track::create($validated);
        return response()->json([ 'success' => true ]);
    }
    public function update()
    {
        //
    }
    public function destroy(string $id)
    {
        try {

            $track = Track::find($id);
            $track->delete();
            return response()->json([ 'success' => true ]);

        } catch (\Throwable $th) {
            return response()->json([ 'message' => 'an error has occur' ], 500);

        }
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
