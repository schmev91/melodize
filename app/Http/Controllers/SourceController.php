<?php

namespace App\Http\Controllers;

use App\Models\source;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SourceController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sources = DB::table('sources')->get();
        return view('backdoor.sources-index', compact('sources'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(source $source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, source $source)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(source $source)
    {
        //
    }
}
