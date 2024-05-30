<?php

namespace App\Http\Controllers\Site;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class About
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return view('client.about');
    }
}
