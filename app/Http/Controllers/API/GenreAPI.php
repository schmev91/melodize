<?php

namespace App\Http\Controllers\API;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function show(Genre $genre): JsonResponse
    {
        return response()->json($genre);
    }

}
