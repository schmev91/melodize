<?php

namespace App\Http\Controllers\Backdoor;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Dashboard
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return view('backdoor.dashboard');
    }
}
