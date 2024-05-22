<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Library
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) : View
    {
        return view('client.library');
    }
}
