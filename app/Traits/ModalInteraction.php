<?php

namespace App\Traits;

trait ModalInteraction
{
    public function openModal(string $modalId): void
    {
        $this->dispatch('dialogCollapse', id: $modalId);

    }
}
