<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Home
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) : View
    {
        return view("client.home");
    }
}
