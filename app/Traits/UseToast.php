<?php

namespace App\Traits;

enum ToastType: string {
    case NORMAL  = 'normal';
    case PERSIST = 'persist';
}
trait UseToast
{
    public function sendToast($message, ToastType $type = ToastType::NORMAL, $name = null)
    {
        $this->dispatch('new-toast', message: $message, type: $type, name: $name);
    }

    public function dismissToasst(string $name)
    {
        $this->dispatch('dismiss-toast', name: $name);
    }
}
