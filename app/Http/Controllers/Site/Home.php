<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Home
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $tracks = DB::table('tracks')->get();
        return view("client.home", compact('tracks'));
    }
}
