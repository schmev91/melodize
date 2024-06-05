<?php

namespace App\Http\Controllers\API;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;

class GenreAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $genre = Genre::find($id);
        return response()->json($genre);
    }

}
