<?php

namespace App\Traits;

trait UseToast
{
    public function sendToast($message)
    {
        $this->dispatch('new-toast', message: $message);
    }
}
